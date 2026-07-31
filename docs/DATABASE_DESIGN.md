# Database Design

Companion to [`database/schema.sql`](../database/schema.sql), [`database/seed_categories.sql`](../database/seed_categories.sql), and [`database/seed_products.sql`](../database/seed_products.sql).

Engine: MySQL 5.7+/8.0, InnoDB, `utf8mb4_unicode_ci` — standard on MilesWeb shared hosting.

---

## 1. Entity-Relationship Overview

```
categories 1───* products
products   1───* order_items *───1 orders
admin_users 1───* audit_logs
```

- `categories` → `products`: one category has many products. `products.category_id` is `NOT NULL` — every product must belong to a category (Rule 4: no hardcoded categories, but every product needs one).
- `orders` → `order_items`: one order has many line items.
- `order_items` → `products`: optional link (`product_id` nullable) — order history must survive a product later being deleted.
- `admin_users` → `audit_logs`: optional link (nullable) — a log entry survives even if the admin account is later removed.
- `settings`, `banners`, `contact_messages` are standalone (no FKs), matching how they're used (site-wide config, homepage content, inbound messages).

---

## 2. Table-by-Table Rationale

### `categories`
Directly maps to CLAUDE.md's Categories requirements: editable name, `display_order`, `status` (active/inactive — an inactive category and its products simply don't render on the public site, without deleting data), optional `image_path`. Seeded with the 9 categories from CLAUDE.md (Gift Boxes, Sparklers, Flower Pots, Rockets, Bombs, Ground Chakkars, Kids Crackers, Fancy Crackers, New Arrivals) — see §4 for how the legacy 177 products were mapped onto these.

### `products`
Covers every field CLAUDE.md's Products module requires, with one deliberate simplification:

> CLAUDE.md lists MRP, Selling Price, Discount %, and Final Price (calculated) as four separate fields.

Storing all four as columns would mean **Selling Price and Final Price are always identical** (both are "MRP minus discount, calculated") — a duplicated, driftable column, which is exactly what Rule 5 and Rule 4 tell us to avoid (it's how the current site ended up with three disagreeing prices in the first place). Instead:

- `mrp` — the list/strikethrough price (admin-editable).
- `discount_percent` — **nullable**. If set, it's a per-product override. If `NULL`, the product uses the store-wide `global_discount_percent` from `settings`.
- **Selling Price / Final Price is never stored.** It's calculated on every read as `mrp * (1 - effective_discount_percent / 100)`, where `effective_discount_percent = discount_percent ?? settings.global_discount_percent`. This is a single line in the `Product` class (see `IMPLEMENTATION_PLAN.md`), not a place prices can silently diverge again.

This satisfies "Admin should be able to change discounts without editing code" (edit the global setting, or one product's override) and "the displayed selling price must be calculated dynamically" literally.

`status` is an ENUM matching CLAUDE.md's four inventory states exactly (`available`, `out_of_stock`, `sold_out`, `hidden`) rather than a generic boolean, since the business rules distinguish "temporarily out of stock" from "discontinued/sold out" from "hidden from customers but still in the system."

`sku` and `slug` are both unique. `slug` isn't used by any URL today (the current site has no per-product page — see `products-show.php` in the Phase 1 assessment) but CLAUDE.md's Customer Features list includes "View Details," implying a product detail page is in scope for this rewrite; the column is here so that page can exist without a later migration.

### `orders` / `order_items`
This is the most important structural change from the current site, where an order exists only as an email (Phase 1 finding: `order-placed.php` doesn't even echo back what was ordered). Every order is now a durable row plus line items.

- `orders.subtotal` / `orders.total` are **computed server-side from the current product prices in the database at checkout time** — never taken from POST data. This directly closes the price-tampering risk identified in Phase 1 (`processorder.php` currently trusts `$_POST['prods_total']` outright).
- `order_items.product_name_snapshot` and `unit_price_snapshot` freeze the name/price *as sold*. If an admin later renames "3 Fancy Special" or changes its price, historical orders still show what the customer actually paid for.
- `order_items.product_id` is nullable with `ON DELETE SET NULL` — deleting a product doesn't delete order history, it just detaches the reference (the snapshot columns retain the information).
- `orders.status` ENUM matches CLAUDE.md's order lifecycle exactly: pending → confirmed → packed → dispatched → delivered, plus cancelled.

### `admin_users`
Minimal but real authentication: `password_hash` (via PHP's `password_hash()`/`password_verify()`, never reversible encryption), `role` (`admin` vs `staff` — enough to support CLAUDE.md's "Users" admin module without building full RBAC, which would be unnecessary complexity for a single-store app), `is_active` to disable an account without deleting it, `last_login_at` for basic visibility.

### `settings`
Generic key-value table rather than one column per setting. CLAUDE.md's Website Settings list (business name, phone, WhatsApp, email, address, footer text, banner refs, social links, global discount) will change over time and shouldn't require a schema migration each time a new setting is needed — Rule 5 (reusable, not repeatedly hand-coded).

### `banners`
Covers both the "Festival Banner" and "Header Banner" mentioned in Website Settings, plus a general hero banner, distinguished by `position`. `starts_at`/`ends_at` let a festival banner be scheduled in advance and expire automatically without an admin having to remember to remove it.

### `contact_messages`
Currently there is no working contact form (Phase 1 finding: `forms/contact.php` was dead/broken code, now removed). A working contact form is confirmed in scope for this project — this table is where it lands; `is_read` supports a simple inbox view in the admin panel.

### `audit_logs`
Addresses the Phase 1 finding that today, prices/stock can be changed by anyone with FTP access with zero record of who changed what, when. Every admin write action should insert one row here (`action`, `entity_type`, `entity_id`, JSON `details` of what changed).

---

## 3. Key Design Decisions Worth Flagging

1. **No stored "final price" column** (see `products` above) — flag if you'd prefer it stored anyway for reporting/export simplicity; it's a five-minute schema change if so.
2. **`category_id` is `NOT NULL`** — every product must have a category. Since the legacy data has no categories at all, this is enforced starting from the migration (see §4), not before.
3. **Soft states over hard deletes** — categories/products/banners are hidden via `status`, not deleted, so nothing about the "no permanent deletion of data" spirit of a live storefront is violated by routine admin actions. Actual `DELETE` remains available for genuine mistakes.
4. **Order totals are server-authoritative** — this is a security fix, not just a schema choice; flagged again in `SECURITY_REVIEW.md`.

---

## 4. Legacy Data → Schema Mapping

The 177 products in `place-order.php`'s `$prodarray` (confirmed by you as the correct price source) were parsed and mapped as follows:

| Legacy field | New column |
|---|---|
| `id` (1–177) | `products.display_order` (preserves current catalog ordering) |
| `name` | `products.name` |
| full price ("Rs X.XX") | `products.mrp` |
| discount price ("Rs Y.YY") | back-computed into `products.discount_percent` = `round((mrp - disc_price) / mrp * 100, 2)`, so the displayed price at migration matches the live site (max rounding drift across all 177 products: ₹0.80, i.e. under a rupee, from DECIMAL(5,2) precision) |
| image path | `products.image_path` (unchanged, same `assets/product-images/...` paths — no image files need to move) |
| *(none — didn't exist)* | `products.category_id`, assigned via best-effort keyword/domain matching — **see the flagged review task in `MIGRATION_PLAN.md`** |
| *(none — didn't exist)* | `products.sku` = `SC-001`…`SC-177` |

`database/seed_products.sql` contains all 177 `INSERT` statements ready to run after `schema.sql` and `seed_categories.sql`. Category distribution from the best-effort mapping:

| Category | Products |
|---|---|
| Bombs | 36 |
| Sparklers | 31 |
| Fancy Crackers | 26 |
| Kids Crackers | 28 |
| Flower Pots | 25 |
| Gift Boxes | 17 |
| Ground Chakkars | 9 |
| Rockets | 5 |
| New Arrivals | 0 (unused until the owner flags specific products) |

This mapping is a starting point, not a finished catalog — several assignments are genuinely ambiguous from product names alone (e.g. is "AK 47" a Kids Cracker or Fancy Cracker?). It's meant to get the store launched with *something* sensible in every category, correctable afterward from the admin panel without touching code, per Rule 4/Rule 5.
