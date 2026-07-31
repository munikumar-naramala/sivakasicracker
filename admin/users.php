<?php
require_once __DIR__ . '/../config/config.php';
AdminAuth::requireRole('admin');

$activeAdminNav = 'users';
$pageTitle = 'Users';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfVerify($_POST['csrf_token'] ?? null)) {
        flash('error', 'Your session expired, please try again.');
        header('Location: users.php');
        exit;
    }

    $action = $_POST['action'] ?? '';

    if ($action === 'toggle_active') {
        $id = (int) $_POST['id'];
        $active = $_POST['active'] === '1';
        if ($id === AdminAuth::currentId() && !$active) {
            flash('error', "You can't deactivate your own account.");
        } else {
            AdminUser::setActive($id, $active);
            AuditLog::record('user.status_change', 'admin_user', $id, ['active' => $active]);
            flash('success', 'User updated.');
        }
        header('Location: users.php');
        exit;
    }

    if ($action === 'create') {
        $username = trim((string) ($_POST['username'] ?? ''));
        $fullName = trim((string) ($_POST['full_name'] ?? ''));
        $email = trim((string) ($_POST['email'] ?? ''));
        $password = (string) ($_POST['password'] ?? '');
        $role = ($_POST['role'] ?? 'staff') === 'admin' ? 'admin' : 'staff';

        if ($username === '' || $fullName === '' || strlen($password) < 10) {
            $errors[] = 'Please fill in all fields; password must be at least 10 characters.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Please enter a valid email address.';
        } elseif (AdminUser::usernameExists($username)) {
            $errors[] = 'That username is already taken.';
        } else {
            $newId = AdminUser::create([
                'username'  => $username,
                'full_name' => $fullName,
                'email'     => $email,
                'password'  => $password,
                'role'      => $role,
            ]);
            AuditLog::record('user.create', 'admin_user', $newId, ['username' => $username, 'role' => $role]);
            flash('success', 'User created.');
            header('Location: users.php');
            exit;
        }
    }
}

$users = AdminUser::all();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include __DIR__ . '/includes/head.php'; ?>
</head>
<body class="admin-body">
  <div class="admin-shell">
    <?php include __DIR__ . '/includes/sidebar.php'; ?>
    <div class="admin-main">
      <?php include __DIR__ . '/includes/topbar.php'; ?>
      <div class="admin-content">
        <?php include __DIR__ . '/includes/flashes.php'; ?>

        <?php foreach ($errors as $error): ?>
          <div class="form-feedback form-feedback--error"><?= e($error) ?></div>
        <?php endforeach; ?>

        <div class="row g-3">
          <div class="col-md-7">
            <div class="admin-card">
              <table class="table align-middle">
                <thead><tr><th>Username</th><th>Name</th><th>Role</th><th>Status</th><th>Last Login</th><th></th></tr></thead>
                <tbody>
                  <?php foreach ($users as $user): ?>
                    <tr>
                      <td><?= e($user['username']) ?></td>
                      <td><?= e($user['full_name']) ?></td>
                      <td><?= e(ucfirst($user['role'])) ?></td>
                      <td><span class="status-badge <?= $user['is_active'] ? '' : 'status-badge--out_of_stock' ?>"><?= $user['is_active'] ? 'Active' : 'Inactive' ?></span></td>
                      <td class="text-muted" style="font-size:12px;"><?= e($user['last_login_at'] ?? 'Never') ?></td>
                      <td class="text-end">
                        <form method="post" style="display:inline;">
                          <?= csrfField() ?>
                          <input type="hidden" name="action" value="toggle_active">
                          <input type="hidden" name="id" value="<?= (int) $user['id'] ?>">
                          <input type="hidden" name="active" value="<?= $user['is_active'] ? '0' : '1' ?>">
                          <button type="submit" class="btn btn-link p-0"><?= $user['is_active'] ? 'Deactivate' : 'Activate' ?></button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="col-md-5">
            <div class="admin-card">
              <h6>Add User</h6>
              <form method="post">
                <?= csrfField() ?>
                <input type="hidden" name="action" value="create">
                <div class="mb-2"><input type="text" name="username" class="form-control" placeholder="Username" required></div>
                <div class="mb-2"><input type="text" name="full_name" class="form-control" placeholder="Full Name" required></div>
                <div class="mb-2"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
                <div class="mb-2"><input type="password" name="password" class="form-control" placeholder="Password (min. 10 chars)" minlength="10" required></div>
                <div class="mb-2">
                  <select name="role" class="form-select">
                    <option value="staff">Staff</option>
                    <option value="admin">Admin</option>
                  </select>
                </div>
                <button type="submit" class="btn-add-cart w-100">Create User</button>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>
</html>
