# Migration Plan

Cutover and rollback plan for taking the live site at https://www.sivakasicracker.com from the current static-PHP setup to the MySQL-backed rewrite, deployed via `public_html` on MilesWeb shared hosting, per your confirmation of the deployment target.

---

## 1. Pre-Migration Checklist (owner-provided)

These block Phase 3 (implementation) start:

- [ ] MySQL database created on MilesWeb, credentials (host, DB name, username, password) provided for `config/database.php` (gitignored — never committed).
- [ ] Confirm PHP version available on the MilesWeb plan (target PHP 8+; if the plan defaults to an older version, it usually needs switching in cPanel's "MultiPHP Manager" or similar).
- [ ] Confirm whether cron is available on the plan (used only for optional scheduled reports; not a hard requirement).
- [ ] Confirm mail sending: does MilesWeb's PHP `mail()` reliably reach Gmail/other inboxes from this account today, or should the rewrite use SMTP via a transactional provider instead? (Worth testing early — this is a common shared-hosting deliverability issue.)
- [ ] Confirm HTTPS/SSL status on the domain (needed for secure session cookies per `SECURITY_REVIEW.md` §11).

## 2. Product Category Review (owner task, not blocking)

`database/seed_products.sql` assigns all 177 legacy products to categories via best-effort keyword matching (documented in `DATABASE_DESIGN.md` §4). This is good enough to launch with, but you should review and correct assignments in the admin panel once it exists — no code or database migration is needed to do this, it's a normal admin edit.

## 3. Environment Setup

1. Run `database/schema.sql`, then `database/seed_categories.sql`, then `database/seed_products.sql` against the MilesWeb MySQL database (via phpMyAdmin import or `mysql` CLI if shell access is available).
2. Create `config/database.php` from `config/database.example.php` with real credentials, directly on the server (never committed to git).
3. Create an initial `admin_users` row (one-time script or a manual `INSERT` with a `password_hash()`-generated value) so there's a way to log into the admin panel for the first time.

## 4. Staging Verification (if the MilesWeb plan supports a subdomain)

If a staging subdomain (e.g. `staging.sivakasicracker.com` or a temp MilesWeb-provided URL) is available on the plan:

1. Deploy the full rewrite there against the same (or a copy of the) database.
2. Verify parity against the live site:
   - All 177 products visible with correct prices (compare a sample against the current live `place-order.php`).
   - Place a real test order end-to-end; confirm the email arrives correctly formatted and the order appears in the admin Orders list.
   - Test on at least: Chrome desktop, Chrome Android, Safari iPhone (per CLAUDE.md's browser support list).
   - Confirm admin panel: add/edit a product, change stock, update an order status, edit a setting — verify each writes correctly and shows in `audit_logs`.
3. Fix anything that doesn't match before proceeding.

If no staging subdomain is available on the basic plan, do this verification locally (e.g. via a local PHP dev server pointed at a local MySQL copy) before touching `public_html`.

## 5. Cutover

1. **Backup first, always.** Download a full copy of the current live `public_html` (all files) and, if the current live site has any database already (it doesn't today, but re-check at cutover time), export that too.
2. Upload the new codebase to `public_html`, replacing the old files. Because URLs are preserved (Rule 3), no redirect rules or `.htaccess` rewrites are needed for existing paths.
3. Verify `config/database.php` on production points at the real production database (not the staging one, if staging was used).
4. Smoke-test immediately after upload: homepage loads, price list loads with real data, a test order can be placed, admin login works.
5. Monitor `logs/` for the first day for any unexpected errors (display_errors is off in production per `SECURITY_REVIEW.md` §8, so this is the only way to see issues).

## 6. Rollback Plan

If something breaks post-cutover and can't be fixed quickly:

1. Re-upload the backed-up copy of the original `public_html` from step 5.1 — this restores the static site immediately (it has no database dependency, so it works standalone).
2. Because the new system's orders live in MySQL (not just email), **check the `orders` table for any orders placed during the broken window before rolling back**, and export them so nothing is lost, since the static fallback site can't display or continue them.
3. Once the underlying issue is diagnosed and fixed, re-attempt cutover from step 5.

## 7. Post-Migration

- Decommission/archive the pre-migration `public_html` backup (keep it for a reasonable retention period, don't delete immediately).
- Walk through the admin panel with you directly to confirm it matches how you actually want to manage products day-to-day — flagged in `IMPLEMENTATION_PLAN.md` as new territory since no admin panel existed before, so the first real usage session is where UX gaps will show up.
- Revisit the category assignments (§2) and the open questions from `MODERNIZATION_PLAN.md` that haven't been resolved yet (contact form rebuild decision, if not already settled).
