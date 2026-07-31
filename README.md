# Sivakasi Cracker Store

Data-driven rewrite of the sivakasicracker.com storefront. See [`docs/`](docs/) for the full modernization plan, database design, and implementation plan.

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

See [`docs/MIGRATION_PLAN.md`](docs/MIGRATION_PLAN.md) for the full cutover checklist. Quick reference:

1. Copy `config/database.example.php` to `config/database.php` and fill in your real MySQL credentials (this file is gitignored — it lives only on the server, never in git).
2. Import the four `database/*.sql` files via phpMyAdmin, in order: `schema.sql`, `seed_categories.sql`, `seed_products.sql`, `seed_settings.sql`.
3. Upload everything to `public_html`.
4. Run the first-time admin setup above.
