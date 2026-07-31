<?php
/**
 * One-time first-admin-account setup. Only works while admin_users is empty,
 * so it can't be used to create a second/rogue account later — but delete
 * this file from the server once you've used it, as defense in depth.
 */
require_once __DIR__ . '/../config/config.php';

$stmt = Database::connection()->query('SELECT COUNT(*) FROM admin_users');
$alreadySetUp = ((int) $stmt->fetchColumn()) > 0;

$error = null;
$success = false;

if (!$alreadySetUp && $_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfVerify($_POST['csrf_token'] ?? null)) {
        $error = 'Your session expired, please refresh and try again.';
    } else {
        $username = trim((string) ($_POST['username'] ?? ''));
        $fullName = trim((string) ($_POST['full_name'] ?? ''));
        $email = trim((string) ($_POST['email'] ?? ''));
        $password = (string) ($_POST['password'] ?? '');
        $confirm = (string) ($_POST['confirm_password'] ?? '');

        if ($username === '' || $fullName === '' || strlen($password) < 10) {
            $error = 'Please fill in all fields; password must be at least 10 characters.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Please enter a valid email address.';
        } elseif ($password !== $confirm) {
            $error = 'Passwords do not match.';
        } else {
            $stmt = Database::connection()->prepare(
                'INSERT INTO admin_users (username, email, password_hash, full_name, role, is_active)
                 VALUES (:username, :email, :hash, :full_name, "admin", 1)'
            );
            $stmt->execute([
                'username'  => $username,
                'email'     => $email,
                'hash'      => password_hash($password, PASSWORD_DEFAULT),
                'full_name' => $fullName,
            ]);
            $success = true;
            $alreadySetUp = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php $pageTitle = 'Initial Setup'; include __DIR__ . '/includes/head.php'; ?>
</head>
<body class="admin-body d-flex align-items-center" style="min-height:100vh;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="admin-card">

          <?php if ($success): ?>
            <h4 class="mb-3">✓ Admin account created</h4>
            <p>You can now <a href="login.php">sign in</a>.</p>
            <p class="text-danger"><strong>Important:</strong> delete <code>admin/setup.php</code> from the server now — it's no longer needed and shouldn't stay on a live site.</p>

          <?php elseif ($alreadySetUp): ?>
            <h4 class="mb-3">Already set up</h4>
            <p>An admin account already exists. If you need another one, create it from Admin → Users after signing in.</p>
            <p><a href="login.php">Go to sign in</a></p>
            <p class="text-danger">Please delete <code>admin/setup.php</code> from the server — it should not remain on a live site.</p>

          <?php else: ?>
            <h4 class="mb-3">Create the first admin account</h4>

            <?php if ($error): ?>
              <div class="form-feedback form-feedback--error"><?= e($error) ?></div>
            <?php endif; ?>

            <form method="post" action="setup.php">
              <?= csrfField() ?>
              <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="full_name" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Password (min. 10 characters)</label>
                <input type="password" name="password" class="form-control" minlength="10" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" minlength="10" required>
              </div>
              <button type="submit" class="btn-add-cart w-100">Create Admin Account</button>
            </form>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</body>
</html>
