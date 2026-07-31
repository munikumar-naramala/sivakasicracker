<?php
require_once __DIR__ . '/../config/config.php';

if (AdminAuth::check()) {
    header('Location: index.php');
    exit;
}

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfVerify($_POST['csrf_token'] ?? null)) {
        $error = 'Your session expired, please try again.';
    } elseif (RateLimiter::tooManyAttempts('admin_login', 6, 300)) {
        $error = 'Too many login attempts. Please wait a few minutes and try again.';
    } else {
        $username = trim((string) ($_POST['username'] ?? ''));
        $password = (string) ($_POST['password'] ?? '');

        if (AdminAuth::attempt($username, $password)) {
            header('Location: index.php');
            exit;
        }

        // Deliberately generic — never reveal whether the username or password was wrong.
        $error = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php $pageTitle = 'Sign In'; include __DIR__ . '/includes/head.php'; ?>
</head>
<body class="admin-body d-flex align-items-center" style="min-height:100vh;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="admin-card">
          <h4 class="text-center mb-4">Admin Sign In</h4>

          <?php if ($error): ?>
            <div class="form-feedback form-feedback--error"><?= e($error) ?></div>
          <?php endif; ?>

          <form method="post" action="login.php">
            <?= csrfField() ?>
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" name="username" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn-add-cart w-100">Sign In</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
