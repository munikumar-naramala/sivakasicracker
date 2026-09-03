# Sivakasi Cracker Store

Data-driven rewrite of the sivakasicracker.com storefront. See [`docs/`](docs/) for the full modernization plan, database design, and implementation plan.

## Status (as of 2026-09-02)

**🟢 LIVE IN PRODUCTION** at https://sivakasicracker.com — the full data-driven rewrite is deployed at the domain root. The original legacy static site is archived at `/v1` (blocked from public access via `.htaccess`, still reachable through cPanel File Manager/FTP if ever needed). The `/v2` staging folder used during testing has been removed.

**Database:** MilesWeb MySQL (`qjoldyks_sivakasicracker`), schema + seed data imported. Test orders/messages created during the `/v2` testing phase were cleaned out via `database/cleanup_test_data.sql` before cutover.

**Verified working in production** (not just locally/in testing):
- Homepage, Price List (177 products, categories, search, AJAX category switching), Product Gallery, Contact form
- Cart: Add to Cart (AJAX), quantity update, per-item Remove, all instant (no page reload)
- Full checkout: order creation, server-side pricing, confirmation page — **85ms response time**, decoupled from email sending (see `finishResponseAndContinue()` in `config/config.php`) so mail delivery issues can never freeze checkout
- HTTPS redirect, `/v1` correctly returns 403, `/v2` correctly returns 404
- Admin panel: logged in and functioning (owner-confirmed)
- Security pass: CSRF on every POST handler, all SQL via PDO prepared statements, output escaping audited, rate limiting, validated image uploads, `.htaccess` protection on internal folders

**Email deliverability — RESOLVED (2026-09-02):** order `SC-2026-000019` confirmation email confirmed received at the test address after full Brevo domain authentication. Path that got here, for future reference: raw `mail()` via MilesWeb was unreliable (`550 rSPAM`, unfixable via headers/content alone) → switched to Brevo SMTP (`classes/SmtpClient.php`, dependency-free) → initial "sender not valid" error → completed full domain authentication (SPF/DKIM/DMARC — all 4 DNS records independently verified via public DNS, not just Brevo's claim) → delivery confirmed working. `config/smtp.php` on the server holds the live Brevo credentials with `from_email = noreply@sivakasicracker.com` (gitignored — recreate from `config/smtp.example.php` + credentials in conversation history if ever lost). If SMTP ever needs disabling, deleting/emptying `config/smtp.php` makes `Mailer.php` fall back to `mail()` automatically, no code change needed.

## TODO — remaining open items

- [ ] Confirm order 19's email landed in the primary inbox (not spam/promotions) — if it did, place one or two more real-feeling test orders over the next few days to confirm consistency, not just a one-off success
- [ ] Delete test orders `SC-2026-000011` through `SC-2026-000019` via Admin → Orders or phpMyAdmin now that email debugging is done
- [ ] Full admin panel walkthrough: Products (incl. image upload), Categories, Orders status update, Settings, Banners, Reports/CSV export — owner confirmed admin login works, but individual modules haven't been explicitly walked through yet
- [ ] Review the auto-assigned product categories via Admin → Products — `seed_products.sql`'s category mapping was a best-effort classification (see `docs/DATABASE_DESIGN.md` §4), not manually verified per product
- [ ] Confirm MilesWeb's PHP version (code targets PHP 8.0+, avoids 8.1-only syntax defensively; site is live and working, so this is effectively confirmed compatible, just not explicitly documented)
- [ ] Decide whether to keep or further customize the new UI styling (current pass is functional/modern but hasn't had a dedicated design review)

## Admin Panel

### First-time setup

The admin panel has no default username/password — nobody, including whoever builds this site, should ever know your admin password. To create the first account:

1. Make sure `database/schema.sql`, `seed_categories.sql`, `seed_products.sql`, and `seed_settings.sql` have been imported (see `docs/MIGRATION_PLAN.md`).
2. Visit `https://www.sivakasicracker.com/admin/setup.php` in your browser.
3. Fill in a username, your name, email, and a password (min. 10 characters) — this is sent straight to your database, not to anyone else.
4. **Delete `admin/setup.php` from the server immediately after.** It refuses to run again once an account exists, but removing the file is good hygiene — it shouldn't sit on a live site.

Admin login is at `https://www.sivakasicracker.com/admin/login.php`.

### If you forget the admin password

There's no "forgot password" email link (that needs working outbound email, which isn't guaranteed on shared hosting, and a permanently-open reset endpoint is itself a risk). Instead, recovery reuses the same setup script, gated by phpMyAdmin access you already have:

1. Log into phpMyAdmin (the link MilesWeb gave you).
2. Open the `qjoldyks_sivakasicracker` database → `admin_users` table.
3. Delete the row for the account you're locked out of (or empty the whole table if you only have the one account).
4. Re-upload `admin/setup.php` to the `admin/` folder if you already deleted it (keep a copy somewhere safe, e.g. in this git repo's history — `git log -- admin/setup.php` — precisely for this).
5. Visit `admin/setup.php` again — since `admin_users` is now empty, it will let you create a fresh account.
6. Delete `admin/setup.php` from the server again afterward.

This keeps password recovery possible without ever having a standing "reset my password" page that an attacker could also use.

### Adding more admin accounts later

Once you have one account, sign in and use **Admin → Users** to add staff/admin accounts — you don't need `setup.php` again after the first account exists.

## Deployment

The initial go-live cutover is done (see Status above). This section is kept as a reference for any future full redeploy (e.g. a new environment). See [`docs/MIGRATION_PLAN.md`](docs/MIGRATION_PLAN.md) for the full checklist. Quick reference:

1. Copy `config/database.example.php` to `config/database.php` and fill in your real MySQL credentials (this file is gitignored — it lives only on the server, never in git).
2. Import the four `database/*.sql` files via phpMyAdmin, in order: `schema.sql`, `seed_categories.sql`, `seed_products.sql`, `seed_settings.sql`.
3. Upload everything to `public_html`.
4. Run the first-time admin setup above.
