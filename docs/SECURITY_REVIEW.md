# Security Review

Consolidates the Phase 1 security findings ([`MODERNIZATION_PLAN.md`](MODERNIZATION_PLAN.md) §4) into concrete required mitigations for the rewrite. Each item below must be verifiably closed before cutover — this is the checklist the migration is reviewed against, not just aspirational guidance.

---

## 1. Price / Total Tampering — **Critical**

**Current state:** `processorder.php` builds the order email entirely from `$_POST` values, including `prod_N_disc_price` and `prods_total`, with no server-side recalculation.

**Required fix:**
- `Order::createFromCart()` looks up every product's current price from the database by `product_id` — it never reads a price from the request.
- Quantity is the only client-supplied value trusted per line item, and even that is bounds-checked (integer, `> 0`, reasonable upper limit to block absurd submissions).
- `orders.subtotal`/`orders.total` are computed server-side and stored; nothing about the total is ever taken from the form.

## 2. Output Escaping — **High**

**Current state:** Customer name/address/email and product names are concatenated directly into the HTML order email with no escaping anywhere in `processorder.php`.

**Required fix:**
- Every value interpolated into `templates/emails/*.php` and any admin-rendered HTML goes through `htmlspecialchars($value, ENT_QUOTES, 'UTF-8')`. Build this as a template helper (`e($value)`) used everywhere, not a per-page reminder.
- Apply the same rule to all admin panel output (product names, category names, customer data in the orders list) — this is standard XSS hygiene the current site has zero of.

## 3. Email Validation & Header Injection — **Medium**

**Current state:** `$customer_email` goes straight into `mail()`'s `$to` parameter with no `filter_var()` check and no CRLF handling.

**Required fix:**
- Validate with `filter_var($email, FILTER_VALIDATE_EMAIL)` before use; reject the submission with a clear error if invalid.
- Never build raw header strings from user input; if a mail library is introduced later, use its built-in header handling rather than string concatenation.

## 4. SQL Injection — **N/A today, must stay N/A**

**Current state:** No database exists yet, so no current exposure. This is the standard the new code must hold itself to.

**Required fix:**
- **100% PDO prepared statements.** No query in the entire codebase concatenates a variable into SQL, including admin search/filter inputs. `classes/Database.php` should make the "easy path" the prepared-statement path so this isn't something every page has to remember.

## 5. CSRF — **Medium**

**Current state:** No CSRF token on `place-order.php`'s form or any admin form (admin doesn't exist yet).

**Required fix:**
- Every state-changing form (place order, all admin add/edit/delete actions, settings updates) includes a per-session CSRF token, verified on submit before any write happens.

## 6. Admin Authentication — **High** (doesn't exist today)

**Required implementation:**
- Passwords hashed with `password_hash()` (bcrypt/argon2 default), verified with `password_verify()` — never stored in plaintext or reversible encryption.
- Session-based auth with `session_regenerate_id(true)` on login to prevent session fixation.
- Generic "invalid username or password" error (don't reveal which field was wrong).
- Basic login rate-limiting (e.g. lock out after N failed attempts within a window, tracked in `admin_users` or a small counter table) to blunt brute-force.
- All admin pages except `login.php` call a `require_login()` guard at the top before any output or DB write.
- `role = admin` gate on the Users module specifically (staff shouldn't be able to create other admin accounts).

## 7. File Upload Security — **High** (new surface — admin can now upload product/banner images)

**Required implementation:**
- Extension **and** MIME-type allowlist (jpg/jpeg/png/webp only for product images).
- Re-encode uploaded images through PHP's GD/Imagick rather than trusting the uploaded bytes as-is — this strips embedded scripts/malformed headers and neutralizes most image-upload exploits.
- Store uploads under `uploads/` with randomly generated filenames (never the user-supplied original filename) to prevent path traversal and overwrite attacks.
- `uploads/` directory should not be executable — ensure `.htaccess` in that folder denies PHP execution (`php_flag engine off` or `RemoveHandler`/`RemoveType` depending on what MilesWeb's Apache config allows), so even a successfully-uploaded malicious file can't be executed server-side.
- Enforce a reasonable max file size both client-side (UX) and server-side (`upload_max_filesize`/`post_max_size` and an explicit check in the upload handler — the server-side check is the one that actually matters).

## 8. Verbose Error Output — **Medium**

**Current state:** `processorder.php:6-7` unconditionally enables `display_errors` in production, leaking PHP notices/warnings into page output.

**Required fix:**
- `display_errors = Off` in production (`config/config.php` or `.htaccess` / `php.ini` override if MilesWeb's panel allows it). Errors go to `logs/` via `error_log`, never to the browser.
- A generic error page for uncaught exceptions — no stack traces or file paths shown to visitors.

## 9. No Rate Limiting on Public Forms — **Medium**

**Current state:** Order form and (if rebuilt) contact form have no abuse protection, and since `mail()`'s `To:` is attacker-controlled today, this is a live spam vector.

**Required fix:**
- Basic honeypot field (invisible to real users, silently rejects bot submissions) as a low-friction first line of defense.
- Simple rate limiting per IP/session on order and contact submissions (e.g. no more than N submissions per minute) — a database-backed counter is sufficient, no need for a dedicated service.
- Since orders will now go through server-side validation and DB persistence rather than an open `mail()` relay, the "spam arbitrary email addresses via the shop's mail" vector is closed by construction (§1 — the recipient is always the shop's own configured address, not attacker-supplied).

## 10. Hardcoded Absolute URLs — **Low**

**Current state:** `processorder.php` hardcodes `http://www.sivakasicracker.com/...` (plain HTTP) in redirects.

**Required fix:**
- Use relative redirects (`header("Location: order-placed.php?order=...")`) or derive the base URL from `$_SERVER` / a single `SITE_URL` config constant, so the app runs correctly in any environment without source edits. Force HTTPS via `.htaccess` redirect at the server level if MilesWeb's SSL is set up (worth confirming certificate status during migration).

## 11. Session Handling — **New, must be done correctly from the start**

**Current state:** No sessions exist anywhere today.

**Required implementation:**
- `session.cookie_httponly = 1`, `session.cookie_secure = 1` (once HTTPS is confirmed working), `session.use_strict_mode = 1`.
- Cart data in `$_SESSION` only — never trust a cart total reconstructed from cookies or hidden form fields.

---

## Out of Scope for This Review

- Payment gateway security — the site remains offline/bank-transfer only per current scope; if a payment gateway is added later, that needs its own dedicated security review (PCI-relevant concerns) at that time.
- Infrastructure-level hardening (server patching, firewall rules) — outside the application's control on shared hosting; MilesWeb's responsibility per their shared hosting terms.
