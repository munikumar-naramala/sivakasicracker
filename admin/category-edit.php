<?php
require_once __DIR__ . '/../config/config.php';
AdminAuth::requireLogin();

$activeAdminNav = 'categories';

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
$category = $id ? Category::find($id) : null;
if ($id && !$category) {
    flash('error', 'Category not found.');
    header('Location: categories.php');
    exit;
}

$pageTitle = $category ? 'Edit Category' : 'Add Category';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfVerify($_POST['csrf_token'] ?? null)) {
        $errors[] = 'Your session expired, please try again.';
    } else {
        $name = trim((string) ($_POST['name'] ?? ''));
        $displayOrder = (int) ($_POST['display_order'] ?? 0);
        $status = ($_POST['status'] ?? 'active') === 'active' ? 'active' : 'inactive';
        $imagePath = $category['image_path'] ?? null;

        if ($name === '') {
            $errors[] = 'Name is required.';
        }

        if (empty($errors) && !empty($_FILES['image']['name'])) {
            try {
                $imagePath = Uploader::handleImage($_FILES['image'], 'categories');
            } catch (RuntimeException $e) {
                $errors[] = $e->getMessage();
            }
        }

        if (empty($errors)) {
            $data = [
                'name'          => $name,
                'slug'          => slugify($name) . ($id ? '' : '-' . bin2hex(random_bytes(2))),
                'image_path'    => $imagePath,
                'display_order' => $displayOrder,
                'status'        => $status,
            ];

            if ($category) {
                $data['slug'] = $category['slug']; // keep existing slug stable once created
                Category::update($id, $data);
                AuditLog::record('category.update', 'category', $id, $data);
                flash('success', 'Category updated.');
            } else {
                $newId = Category::create($data);
                AuditLog::record('category.create', 'category', $newId, $data);
                flash('success', 'Category created.');
            }

            header('Location: categories.php');
            exit;
        }
    }
}
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

        <?php foreach ($errors as $error): ?>
          <div class="form-feedback form-feedback--error"><?= e($error) ?></div>
        <?php endforeach; ?>

        <div class="admin-card" style="max-width:600px;">
          <form method="post" enctype="multipart/form-data">
            <?= csrfField() ?>

            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" name="name" class="form-control" required value="<?= e($category['name'] ?? '') ?>">
            </div>

            <div class="mb-3">
              <label class="form-label">Image (optional)</label>
              <?php if (!empty($category['image_path'])): ?>
                <div class="mb-2"><img src="../<?= e($category['image_path']) ?>" style="max-width:120px; border-radius:6px;"></div>
              <?php endif; ?>
              <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/webp">
            </div>

            <div class="row">
              <div class="col-6 mb-3">
                <label class="form-label">Display Order</label>
                <input type="number" name="display_order" class="form-control" value="<?= (int) ($category['display_order'] ?? 0) ?>">
              </div>
              <div class="col-6 mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                  <option value="active" <?= ($category['status'] ?? 'active') === 'active' ? 'selected' : '' ?>>Active</option>
                  <option value="inactive" <?= ($category['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                </select>
              </div>
            </div>

            <button type="submit" class="btn-add-cart">Save</button>
            <a href="categories.php" class="ms-2">Cancel</a>
          </form>
        </div>

      </div>
    </div>
  </div>
</body>
</html>
