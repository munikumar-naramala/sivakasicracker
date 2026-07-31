<?php
require_once __DIR__ . '/../config/config.php';
AdminAuth::requireLogin();

$activeAdminNav = 'categories';
$pageTitle = 'Categories';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'toggle_status') {
    if (!csrfVerify($_POST['csrf_token'] ?? null)) {
        flash('error', 'Your session expired, please try again.');
    } else {
        $id = (int) $_POST['id'];
        $category = Category::find($id);
        if ($category) {
            $newStatus = $category['status'] === 'active' ? 'inactive' : 'active';
            Category::update($id, array_merge($category, ['status' => $newStatus]));
            AuditLog::record('category.status_change', 'category', $id, ['status' => $newStatus]);
            flash('success', 'Category status updated.');
        }
    }
    header('Location: categories.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete') {
    if (!csrfVerify($_POST['csrf_token'] ?? null)) {
        flash('error', 'Your session expired, please try again.');
    } else {
        $id = (int) $_POST['id'];
        if (Category::productCount($id) > 0) {
            flash('error', 'This category still has products assigned — reassign or remove them first.');
        } else {
            Category::delete($id);
            AuditLog::record('category.delete', 'category', $id);
            flash('success', 'Category deleted.');
        }
    }
    header('Location: categories.php');
    exit;
}

$categories = Category::all();
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

        <div class="d-flex justify-content-between align-items-center mb-3">
          <div></div>
          <a href="category-edit.php" class="btn-add-cart" style="display:inline-flex; text-decoration:none;">+ Add Category</a>
        </div>

        <div class="admin-card">
          <table class="table align-middle">
            <thead>
              <tr>
                <th>Order</th>
                <th>Name</th>
                <th>Products</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($categories as $category): ?>
                <tr>
                  <td><?= (int) $category['display_order'] ?></td>
                  <td><?= e($category['name']) ?></td>
                  <td><?= Category::productCount((int) $category['id']) ?></td>
                  <td>
                    <span class="status-badge <?= $category['status'] === 'active' ? '' : 'status-badge--out_of_stock' ?>">
                      <?= e(ucfirst($category['status'])) ?>
                    </span>
                  </td>
                  <td class="text-end">
                    <a href="category-edit.php?id=<?= (int) $category['id'] ?>">Edit</a>
                    ·
                    <form method="post" action="categories.php" style="display:inline;">
                      <?= csrfField() ?>
                      <input type="hidden" name="action" value="toggle_status">
                      <input type="hidden" name="id" value="<?= (int) $category['id'] ?>">
                      <button type="submit" class="btn btn-link p-0" style="vertical-align:baseline;">
                        <?= $category['status'] === 'active' ? 'Deactivate' : 'Activate' ?>
                      </button>
                    </form>
                    ·
                    <form method="post" action="categories.php" style="display:inline;"
                          onsubmit="return confirm('Delete this category? This cannot be undone.');">
                      <?= csrfField() ?>
                      <input type="hidden" name="action" value="delete">
                      <input type="hidden" name="id" value="<?= (int) $category['id'] ?>">
                      <button type="submit" class="btn btn-link p-0 text-danger" style="vertical-align:baseline;">Delete</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
