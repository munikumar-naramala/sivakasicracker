# Implementation Plan

Stack: PHP 8+, MySQL (PDO), Bootstrap 5, vanilla JS, no framework — per CLAUDE.md Rule 6 and the MilesWeb shared-hosting target (upload-to-`public_html`, no build step, no Composer dependency required at runtime).

---

## 1. Target Folder Structure

```
public_html/                        (repo root — this is what gets uploaded as-is)
├── admin/
│   ├── index.php                   dashboard
│   ├── login.php
│   ├── logout.php
│   ├── products.php                list + bulk actions
│   ├── product-edit.php            add/edit form
│   ├── categories.php
│   ├── orders.php                  list + status update
│   ├── order-detail.php
│   ├── banners.php
│   ├── settings.php
│   ├── reports.php
│   ├── users.php
│   └── includes/
│       ├── admin-header.php
│       ├── admin-sidebar.php
│       └── admin-footer.php
├── api/                             (small JSON endpoints only where a page reload is genuinely wrong — see §4)
│   └── cart-total.php
├── assets/                          (unchanged: css/js/img/vendor/product-images)
├── classes/
│   ├── Database.php                 PDO singleton
│   ├── Product.php
│   ├── Category.php
│   ├── Order.php
│   ├── Cart.php                     session-backed cart
│   ├── Mailer.php
│   ├── Setting.php
│   ├── AdminAuth.php
│   └── AuditLog.php
├── config/
│   ├── config.php                   non-secret constants (site name fallback, upload limits, etc.)
│   └── database.php                 DB credentials — see §2, gitignored, not committed
├── database/
│   ├── schema.sql
│   ├── seed_categories.sql
│   └── seed_products.sql
├── docs/
├── includes/
│   ├── header.php                   topbar + nav (replaces copy-pasted markup in every page)
│   ├── footer.php
│   ├── head-meta.php                <head> favicons/fonts/CSS includes
│   └── scripts.php                  shared <script> includes
├── logs/                             (app error log, gitignored)
├── templates/
│   └── emails/
│       ├── order-customer.php
│       └── order-admin.php
├── uploads/                          (admin-uploaded product/banner images, gitignored)
├── forms/                            (kept only if the contact form is rebuilt — see open question)
├── index.php
├── price-list.php
├── products-show.php
├── place-order.php
├── processorder.php
├── order-placed.php
└── contact.php                       (only if rebuilt)
```

Existing top-level URLs (`price-list.php`, `place-order.php`, `products-show.php`, `processorder.php`, `order-placed.php`, `index.php`) **stay at the same paths** — Rule 3. They become thin views that pull from the DB instead of static HTML/PHP arrays.

---

## 2. Configuration & Secrets

`config/database.php` (gitignored — you provide the actual MilesWeb DB host/name/user/password once the database exists):

```php
<?php
return [
    'host'     => getenv('DB_HOST') ?: 'localhost',
    'dbname'   => getenv('DB_NAME') ?: '',
    'username' => getenv('DB_USER') ?: '',
    'password' => getenv('DB_PASS') ?: '',
    'charset'  => 'utf8mb4',
];
```

On MilesWeb (typical shared hosting), environment variables usually aren't set per-request, so a local, gitignored `config/database.php` with the literal values filled in is the pragmatic choice — `.env` + a loader library is unnecessary complexity for a single-environment deployment (Rule 6). A `config/database.example.php` with placeholder values is committed instead, so the real file is never accidentally pushed.

`classes/Database.php` wraps this in a single PDO singleton (prepared statements only, `ERRMODE_EXCEPTION`, no raw string interpolation anywhere — closes the Phase 1 finding that the current code has zero DB layer to get this right in the first place).

---

## 3. Core Classes (Rule 5 — reusable, not duplicated)

| Class | Responsibility |
|---|---|
| `Database` | PDO connection singleton |
| `Product` | CRUD + `getEffectivePrice()` (the `mrp`/`discount_percent`/global-fallback calculation from `DATABASE_DESIGN.md`), category filtering, search |
| `Category` | CRUD, active-category listing ordered by `display_order` |
| `Cart` | Session-backed (`$_SESSION['cart']` = `[product_id => qty]`); replaces the current "cart is just the live DOM state of a 764-line form" |
| `Order` | Create from `Cart` (recomputing every price server-side from `Product`, never trusting client input), status transitions, listing/filtering for admin |
| `Mailer` | Wraps `mail()` (or SMTP via the host's mail relay if `mail()` deliverability proves poor — flagged for testing during migration) behind one `send(template, data)` call, output-escapes all interpolated values |
| `Setting` | Get/set from the `settings` table, with in-request caching so a page doesn't run 10 separate settings queries |
| `AdminAuth` | Login/logout, session handling, `require_login()` guard, password hashing via `password_hash()`/`password_verify()` |
| `AuditLog` | One `record($action, $entityType, $entityId, $details)` call, used by every admin write path |

---

## 4. Page-by-Page Rewrite Plan

### Public site

- **`index.php`** — homepage sections (hero, about, featured products, contact) pull `is_featured` products and `settings` values instead of hardcoded HTML. Shared chrome moves into `includes/header.php`/`footer.php`.
- **`price-list.php`** — becomes a loop over `Product::getAllVisible()` grouped by category, replacing the static 2,300-line table. Category filter via query string (`?category=sparklers`), preserving the existing URL as the base path.
- **`products-show.php`** — same data source as the price list (one `products` table now, not a second hand-maintained list), rendered as the existing image-gallery/slideshow UI.
- **`price-list.php`** / **`products-show.php`** — get real "Add to Cart" controls per product, posting `product_id` + `quantity` to `Cart` (confirmed approach — see below).
- **`place-order.php`** — becomes a cart review + customer-details page: line items sourced from `Cart` (session-backed `product_id => qty`), quantity adjustable per row, prices/names read-only (never editable inputs — closes the tampering surface in `SECURITY_REVIEW.md` §1), customer detail fields, single "Place Order" submit to `processorder.php`. This replaces the current single 764-line form listing the entire catalog with quantity boxes.
- **`processorder.php`** — validates customer fields (`filter_var(..., FILTER_VALIDATE_EMAIL)`, required-field checks), builds an `Order` **from server-side `Product` prices only**, persists it, sends templated emails via `Mailer`, redirects to `order-placed.php?order=<order_number>`.
- **`order-placed.php`** — looks up the just-created order by `order_number` and actually displays what was ordered (fixes the Phase 1 finding that this page currently shows generic static text only).
- **`contact.php`** *(pending your decision)* — if rebuilt: simple validated form → `contact_messages` table + optional notification email, replacing the currently dead `forms/contact.php`.

### Admin panel (`admin/`)

| Module | Contents |
|---|---|
| Auth | `login.php` (rate-limited, generic error message on failure), session-based `require_login()` on every other admin page |
| Dashboard | Today's orders, pending orders, revenue, most-ordered products, out-of-stock list, recently added products — all live queries, no cached/static numbers |
| Products | List (filter by category/status, search), add/edit form (image upload via a validated `classes/Uploader.php` — extension allowlist, re-encode on upload, random filename), bulk status/discount update, delete (soft via `status = hidden` by default, hard delete as a separate confirmed action) |
| Categories | List, add/edit, reorder (`display_order`), activate/deactivate |
| Orders | List (filter by status/date), detail view, status-update dropdown (writes to `audit_logs`) |
| Discount Management | Edit `settings.global_discount_percent`; per-product override lives on the product edit form |
| Banners | CRUD, position (`hero`/`header`/`festival`), schedule via `starts_at`/`ends_at` |
| Website Settings | Single form bound to the `settings` key-value table (business name, phone, WhatsApp, email, address, footer text, social links) |
| Users | List/add/deactivate admin accounts (role: admin/staff) — only accessible to `role = admin` |
| Reports | Orders by date range, top-selling products, revenue summary, low-stock list, CSV export (native `fputcsv()`, no library needed) |

---

## 5. Migration Script

A one-time `database/seed_products.sql` (already generated, see `DATABASE_DESIGN.md` §4) loads the 177 legacy products. No PHP migration script is needed beyond running the three SQL files in order once the database exists:

```bash
mysql -u <user> -p <dbname> < database/schema.sql
mysql -u <user> -p <dbname> < database/seed_categories.sql
mysql -u <user> -p <dbname> < database/seed_products.sql
```

(Or via phpMyAdmin's "Import" tab, which is what MilesWeb's cPanel typically exposes — worth confirming which access method you have.)

---

## 6. Order of Implementation

1. `classes/Database.php` + `config/database.php` (once you provide credentials) + confirm connectivity.
2. Run `schema.sql` + seed files against the real database.
3. `includes/header.php` / `footer.php` — extract shared chrome once, verify `index.php` still renders identically using them.
4. `classes/Product.php`, `classes/Category.php` — read path only.
5. Rewrite `price-list.php` and `products-show.php` to read from the DB (biggest immediate win: kills two of the three drifting product lists).
6. `classes/Cart.php`, `classes/Order.php`, `classes/Mailer.php` — rewrite the order flow (`place-order.php` → `processorder.php` → `order-placed.php`).
7. Admin panel: auth first, then Products/Categories (lets you take over data entry from raw SQL), then Orders, then the remaining modules (Banners, Settings, Users, Reports) roughly in CLAUDE.md's listed priority order.
8. Security pass (CSRF tokens, output escaping audit, upload validation) — see `SECURITY_REVIEW.md`.
9. Cross-browser/device QA, then cutover per `MIGRATION_PLAN.md`.
