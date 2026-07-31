# Sivakasi Cracker Store — Modernization Plan (Phase 1 Assessment)

**Status:** Draft for review — no code has been modified yet.
**Live site:** https://www.sivakasicracker.com
**Hosting target:** MilesWeb shared hosting (PHP + MySQL, standard cPanel-style environment; no shell access assumed beyond what shared hosting typically offers)

This document is the required Phase 1 deliverable before any implementation work begins. It is based on a full read-through of every PHP page, JS file, and the CSS in the current source tree.

---

## 1. Current Architecture

The site is a **100% static-content PHP application** built on top of the "BizLand" Bootstrap template (v3.3.0, see `Readme.txt` / `changelog.txt`). There is:

- No database (no `mysqli`, `PDO`, or `mysql_connect` anywhere in the codebase).
- No router, no autoloader, no config file, no `.env`.
- No shared includes — every page hand-copies the same topbar, header, nav, footer, and Terms & Conditions HTML. `grep` for `include(`/`require(` across the site returns only one hit (`forms/contact.php`, and it points at a file that doesn't exist).
- No sessions and no cart persistence — `session_start()` and `$_SESSION` appear nowhere in the codebase.
- No REST/JSON endpoints — everything is a traditional `<form method="post">` submit followed by a full-page reload or `header("Location: ...")` redirect.

### Pages and their roles

| File | Lines | Role |
|---|---|---|
| `index.php` | 418 | Homepage: hero, about, contact info, terms |
| `price-list.php` | 2,449 | Static HTML price table, one `<tr>` per product (no PHP loop) |
| `products-show.php` | 1,545 | Static image gallery, 167 hand-authored slide `<div>`s (no PHP loop) |
| `place-order.php` | 764 | Order form — the **only** page with real product data in a PHP array, rendered via a loop |
| `processorder.php` | 2,438 | Order handler — reads POST, builds an HTML email, sends via `mail()` |
| `order-placed.php` | 211 | Static "thank you" confirmation page (does not echo back order details) |
| `forms/contact.php` | 41 | Dead template stub — see §3, §4 |
| `slideshow.php` | 73 | Orphaned prototype, not linked anywhere |
| `under-construction.php` / `under-construction-page.php` | 269 each | Orphaned duplicates, not linked anywhere |
| `assets/js/main.js` | 282 | Template JS (nav, animations, etc.) |
| `assets/js/orderform.js` | 88 | Client-side quantity × price row calculation on `place-order.php` |
| `assets/css/style.css` | 1,783 | Mostly template CSS with some custom overrides |

### Request flow (order placement)

1. Customer views `price-list.php` and/or `products-show.php` — informational only, no add-to-cart action on either page.
2. Customer opens `place-order.php`. Server renders a PHP array of **177 products** as an HTML `<table>` inside one big `<form action="processorder.php">`. Every row has editable-looking `readonly` text inputs for name/price and a quantity input defaulting to 0.
3. `assets/js/orderform.js` recalculates a per-row subtotal and running total client-side purely for display — this is cosmetic and is **not** what gets submitted.
4. On submit, the entire form state (177 rows × ~4 fields) is POSTed in one request to `processorder.php`. There is no cart object anywhere — the DOM state at submit time *is* the cart.
5. `processorder.php` reads back all submitted names/prices/quantities/total **as-is**, with no server-side recalculation from a canonical price source, and builds an HTML table for an email body.
6. The email is sent via PHP's built-in `mail()` (no PHPMailer/SMTP library) to the customer's own self-reported address, Cc'ing the shop owner (`shivatraders6@gmail.com`).
7. On success, redirect to `order-placed.php` (hardcoded absolute `http://www.sivakasicracker.com/...` URL) which shows a static thank-you message with bank-transfer details. It does not display what was actually ordered.
8. Payment is entirely offline: bank account details are printed in the page footer; there is no payment gateway integration.

---

## 2. Existing Features (to preserve)

- Product browsing via price list (`price-list.php`) and image gallery (`products-show.php`).
- Full order form with quantity entry across the entire catalog (`place-order.php`).
- Client-side running total calculation while filling the form.
- Order submission that emails both the customer and the shop owner an itemized order.
- Order confirmation page with payment/bank-transfer instructions.
- Product image "pop-up"/lightbox preview (`.pop` click handler, present in both `price-list.php` and `place-order.php`, implemented slightly differently in each).
- Static informational content: About, Terms & Conditions, contact details, business address, bank account details for payment.
- Mobile-usable (Bootstrap-based) but not meaningfully optimized for small screens beyond the template defaults.

These must all continue to work after migration; none should be silently dropped without approval.

---

## 3. Hardcoded Areas (must be eliminated per Rule 4)

### 3.1 Three independent, drifting product-data sources — the core problem

1. **`price-list.php:156-2335`** — static HTML table, 166 active products (3 more sit disabled inside an HTML comment at `price-list.php:2298-2335`).
2. **`products-show.php:92-1444`** — 167 static image-gallery `<div>` blocks, name only, no price.
3. **`place-order.php:194-393`** (`$prodarray`) — 177 PHP array entries (176 active, 1 commented out), the most authoritative list since it drives the actual order.

**These have already diverged in production.** Example: "2.75 Kurvi" is ₹50.00 / ₹10.00 in `price-list.php:159-160` but ₹40.00 / ₹8.00 in `place-order.php:195`. This is exactly the class of bug a single MySQL `products` table eliminates.

Also present: a ~190-line block of an **entirely different, older** `$prodarray` left commented out at `place-order.php:396-582`, and one commented single item at `place-order.php:224`.

### 3.2 Order processing mirrors the array by hand

`processorder.php:13-721` declares 177 blocks of `$prod_N_name/$prod_N_price/$prod_N_quant = $_POST[...]`, followed by 177 near-identical `if ($prod_N_quant != 0) {...}` blocks (`processorder.php:745-2361`) that build the email row-by-row. This is the kind of manually-unrolled, copy-pasted logic that a `foreach` over an `order_items` result set replaces entirely.

**Known live bug from this duplication:** `processorder.php:1901` references `$prod_127__price` (double underscore, typo) instead of the declared `$prod_127_price`. This silently blanks item 127's unit price in every order confirmation email today.

### 3.3 Site chrome duplicated per page (not hardcoded data, but hardcoded markup)

Topbar contact info, footer address, bank account numbers, and Terms & Conditions are copy-pasted verbatim across `index.php`, `price-list.php`, `products-show.php`, `place-order.php`, `order-placed.php`, and the `under-construction*.php` pages (e.g. bank details at `index.php:333-355`, repeated near-identically in at least 5 other files). This should become shared PHP includes / a settings table, per Rule 5 (no duplication).

### 3.4 Product/category count mismatch

- `price-list.php`: 166 active products
- `products-show.php`: 167 image slides
- `place-order.php` / `processorder.php`: 176 active order-line products

No category structure exists anywhere in the current code — everything is one flat numbered list. Categories (Gift Boxes, Sparklers, Flower Pots, etc., per CLAUDE.md) do not exist today and will need to be defined during data migration, likely by the business owner, since the current data has no grouping signal to infer them from.

### 3.5 Other hardcoded values

- Owner email `shivatraders6@gmail.com` hardcoded in `index.php:49,215,303` and `processorder.php:2393`.
- Production URL hardcoded as plain HTTP in `processorder.php:2402,2415`.
- Bank account numbers/IFSC in page footers (business decision, not necessarily wrong, but should move to Website Settings so it's editable without a code change).

---

## 4. Risks

| Risk | Detail | Severity |
|---|---|---|
| **Price/total tampering** | `processorder.php` trusts POSTed prices/totals with zero server-side recalculation. Since the "readonly" inputs in `place-order.php:606-621` are plain HTML attributes, any raw POST (curl, edited DOM, disabled JS) can forge arbitrary prices into the order email. Financial impact is currently bounded by manual human review before fulfillment, but the "official" emailed total cannot be trusted as-is. | High — must be fixed in the rewrite (server computes price from DB, never trusts client-submitted price) |
| **No input sanitization on email output** | Customer name/address/email/product names are concatenated directly into the HTML email body with no `htmlspecialchars()` anywhere in `processorder.php`. HTML/script injection into the order email is possible. | Medium |
| **No email validation** | `$customer_email` (`processorder.php:10`) is used directly as the `mail()` `To:` address with no `filter_var(..., FILTER_VALIDATE_EMAIL)` anywhere in the codebase, and no CRLF stripping. | Medium |
| **No CSRF protection** | `place-order.php`'s form has no CSRF token. Low real-world impact today (public, unauthenticated order form) but should be closed in the rewrite. | Low–Medium |
| **Verbose error display in production** | `processorder.php:6-7` unconditionally sets `display_errors=1` on every order submission, which leaks PHP notices/warnings into page output (e.g. exposes the `$prod_127__price` typo). | Medium (info disclosure) |
| **No rate limiting / spam vector** | Because `To:` is attacker-controlled (customer's self-reported email) and there's no CAPTCHA, the form can be scripted to spam arbitrary addresses via the shop's outgoing mail. | Medium |
| **Zero admin tooling** | Every price/stock change today requires direct PHP source edits across up to three files, by whoever has hosting/FTP access. No audit trail. | High operational risk, core reason for this project |
| **No order persistence** | Every order exists only as an email. If the email fails or is lost, there is no record. `order-placed.php` doesn't even echo back what was ordered. | High — directly addressed by Rule 4 (MySQL orders table) |
| **SEO / URL preservation** | Per CLAUDE.md Rule 3, existing URLs (`price-list.php`, `place-order.php`, `products-show.php`, etc.) should keep resolving after migration, ideally as the same paths (even if now backed by PHP+MySQL rather than static HTML) rather than redirecting to a new URL scheme. | Medium, addressed by keeping file-based routing where practical |
| **Shared hosting constraints** | MilesWeb shared hosting means: no guaranteed shell/cron access without checking the plan, PHP version fixed by hosting panel (assume PHP 8+ available but must be verified), `mail()` deliverability is often poor from shared IPs — worth evaluating SMTP via a transactional provider or the host's configured `sendmail`, and file upload directory permissions need care. | Needs verification against actual MilesWeb plan before implementation |

---

## 5. Technical Debt

- **Triplicated product data** (§3.1) — the single highest-priority item; this is precisely what a `products` table fixes.
- **Massive copy-pasted per-product logic** in `processorder.php` (177 near-identical blocks) and `place-order.php` (177 near-identical array rows) — replace with data-driven loops over DB query results.
- **No shared page chrome** — header/footer/nav/terms duplicated across 8 files. Should become PHP includes (`includes/header.php`, `includes/footer.php`, etc.) per the target folder structure.
- **Multiple, conflicting frontend library versions loaded simultaneously**: `place-order.php` loads Bootstrap 3.3.7 (CDN) *and* Bootstrap 5.3.0 (CDN) *and* the local vendored Bootstrap 5 *and* jQuery 1.12.4, all on one page, apparently just to support an image-preview modal that's implemented slightly differently (and redundantly) between `price-list.php` and `place-order.php`.
- **Dead code to remove** (pending approval per Rule 2):
  - `under-construction.php` / `under-construction-page.php` — byte-identical except one typo'd phone digit, neither linked from anywhere.
  - `forms/contact.php` — references a vendor library (`assets/vendor/php-email-form/php-email-form.php`) that doesn't exist; would fatal if ever invoked. The only form pointing at it is itself inside a commented-out block in `index.php:234-266`.
  - `slideshow.php` — orphaned 4-slide prototype, not linked anywhere.
  - The ~190-line commented-out legacy `$prodarray` in `place-order.php:396-582`.
- **No `.gitignore`/version control at all** — this project isn't currently in a git repository. Worth establishing one before making changes, so all migration work is tracked and reversible.
- **No environment separation** — hardcoded absolute production URLs (`processorder.php:2402,2415`) mean the code cannot run correctly in a staging/local environment without source edits.

---

## 6. Migration Strategy

Consistent with CLAUDE.md's incremental, non-breaking mandate:

1. **Phase 1 (this document)** — assessment, no code changes. ✅ in progress.
2. **Phase 2 — Architecture & DB design** — produce `docs/DATABASE_DESIGN.md` and `database/schema.sql` (products, categories, orders, order_items, admin_users, settings, banners, contact_messages, audit_logs) reflecting the fields actually used today (name, MRP, discount price, image, plus new fields: SKU, stock, status, display order, featured, category).
3. **Data extraction** — write a one-time migration script that parses the current `$prodarray` in `place-order.php` (the most complete/authoritative source of the three) into the new `products` table, flagging the divergences found in §3.1/§3.4 for manual reconciliation with the business owner rather than silently picking one number.
4. **Category assignment** — since no category data exists today, propose a category list (per CLAUDE.md's examples) and get sign-off before assigning products, likely a manual pass since product names alone don't reliably imply category.
5. **Build data-driven pages behind the same URLs** — `price-list.php`, `products-show.php`, and `place-order.php` become thin PHP views querying MySQL via PDO, instead of static HTML/arrays. Keep the same file paths/URLs (Rule 3).
6. **Rebuild order flow** — `place-order.php` posts a cart to a new `processorder.php` that persists to `orders`/`order_items` tables, computing prices server-side from the DB (closing the price-tampering risk in §4), then sends templated HTML email via a reusable mailer class. `order-placed.php` should read back the just-created order from the DB rather than showing generic static text.
7. **Admin panel** — new `admin/` app for product/category/order/discount/banner/settings management, with proper authentication (Rule: secure admin panel).
8. **Cutover** — deploy alongside the existing static site on a staging subdomain first if MilesWeb plan allows, verify parity (prices, order emails, mobile rendering) against the live site, then cut over. Keep a copy of the current static files as rollback fallback.
9. **Rollback plan** — since MilesWeb is likely FTP/cPanel-based, rollback is: restore the previous file set from backup and, if the DB-backed order table has already received live orders, export those before reverting so no orders are lost.

---

## 7. Estimated Work Breakdown

| Phase | Scope | Rough Effort |
|---|---|---|
| Phase 1 | Assessment (this doc) | Done |
| Phase 2 | DB schema design + `IMPLEMENTATION_PLAN.md` + `UI_WIREFRAMES.md` + `SECURITY_REVIEW.md` + `MIGRATION_PLAN.md` | 1–2 days |
| Data migration | Extract/reconcile the 3 divergent product sources into one canonical dataset (needs business owner input on price discrepancies and category assignment) | 1–2 days + owner review time |
| Core includes/config | `includes/` header/footer/nav, `config/database.php` (PDO), `classes/` (Product, Order, Mailer, etc.) | 1–2 days |
| Public site rewrite | `index.php`, `price-list.php`, `products-show.php` as data-driven views; Bootstrap 5 UI modernization; responsive pass | 3–5 days |
| Order flow rewrite | `place-order.php` (dynamic cart), `processorder.php` (server-side pricing, DB persistence, templated email), `order-placed.php` (real order lookup) | 2–3 days |
| Admin panel | Auth, Dashboard, Products, Categories, Orders, Discounts, Banners, Settings, Reports (CSV export) | 5–8 days |
| Security hardening | Prepared statements throughout, CSRF tokens, output escaping, email validation, input validation, secure upload handling | Folded into above, +1 day dedicated review |
| Testing & UAT | Cross-browser/device pass, order-flow regression vs. current site, admin panel walkthrough with owner | 2–3 days |
| Cutover & rollback prep | Staging deploy, DNS/file swap plan, backups | 0.5–1 day |

This is a rough sizing for planning purposes, not a committed schedule — actual pace depends on how much of Phase 2–7 you'd like reviewed/approved before implementation starts, per the "never skip documentation" workflow rule.

---

## Open Questions for Owner Sign-off Before Phase 2

1. **Price discrepancies** (e.g. "2.75 Kurvi" ₹50/₹10 vs ₹40/₹8): which figure is correct? All 177 products in `place-order.php` should be treated as needing a full price audit against current reality, not just this one example.
2. **Category taxonomy**: confirm the category list to use (CLAUDE.md suggests Gift Boxes, Sparklers, Flower Pots, Rockets, Bombs, Ground Chakkars, Kids Crackers, Fancy Crackers, New Arrivals) and who will assign the ~176 products to them.
3. **Dead files**: approve deletion of `under-construction.php`, `under-construction-page.php`, `slideshow.php`, `forms/contact.php`, and the commented-out legacy array in `place-order.php` (Rule 2 requires explicit approval before removing anything).
4. **The 3 discontinued products** (commented out in `price-list.php:2298-2335`) and 1 in `place-order.php:224` — drop entirely, or migrate as `status = hidden/discontinued`?
5. **Contact form**: since `forms/contact.php` is currently dead/broken and not linked, confirm whether a working contact form should be (re)built as part of this project (CLAUDE.md lists `contact_messages` as a table, implying yes).
6. **MilesWeb plan specifics**: PHP version available, whether cron is available (for scheduled reports), mail sending method (built-in `mail()` vs SMTP relay) — needs confirming with the hosting account before Phase 2 finalizes the stack assumptions.
