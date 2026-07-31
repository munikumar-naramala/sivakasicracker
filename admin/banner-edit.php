<?php
require_once __DIR__ . '/../config/config.php';
AdminAuth::requireLogin();

$activeAdminNav = 'banners';

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
$banner = $id ? Banner::find($id) : null;
if ($id && !$banner) {
    flash('error', 'Banner not found.');
    header('Location: banners.php');
    exit;
}

$pageTitle = $banner ? 'Edit Banner' : 'Add Banner';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfVerify($_POST['csrf_token'] ?? null)) {
        $errors[] = 'Your session expired, please try again.';
    } else {
        $title = trim((string) ($_POST['title'] ?? ''));
        $linkUrl = trim((string) ($_POST['link_url'] ?? ''));
        $position = $_POST['position'] ?? 'hero';
        $displayOrder = (int) ($_POST['display_order'] ?? 0);
        $status = ($_POST['status'] ?? 'active') === 'active' ? 'active' : 'inactive';
        $startsAt = trim((string) ($_POST['starts_at'] ?? ''));
        $endsAt = trim((string) ($_POST['ends_at'] ?? ''));
        $imagePath = $banner['image_path'] ?? null;

        if ($title === '') $errors[] = 'Title is required.';
        if (!in_array($position, ['hero', 'header', 'festival'], true)) $errors[] = 'Invalid position.';

        if (empty($errors) && !empty($_FILES['image']['name'])) {
            try {
                $imagePath = Uploader::handleImage($_FILES['image'], 'banners');
            } catch (RuntimeException $e) {
                $errors[] = $e->getMessage();
            }
        } elseif (!$banner && empty($imagePath)) {
            $errors[] = 'Please upload a banner image.';
        }

        if (empty($errors)) {
            $data = [
                'title'         => $title,
                'image_path'    => $imagePath,
                'link_url'      => $linkUrl,
                'position'      => $position,
                'display_order' => $displayOrder,
                'status'        => $status,
                'starts_at'     => $startsAt,
                'ends_at'       => $endsAt,
            ];

            if ($banner) {
                Banner::update($id, $data);
                AuditLog::record('banner.update', 'banner', $id, $data);
                flash('success', 'Banner updated.');
            } else {
                $newId = Banner::create($data);
                AuditLog::record('banner.create', 'banner', $newId, $data);
                flash('success', 'Banner created.');
            }

            header('Location: banners.php');
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
              <label class="form-label">Title</label>
              <input type="text" name="title" class="form-control" required value="<?= e($banner['title'] ?? '') ?>">
            </div>

            <div class="mb-3">
              <label class="form-label">Image</label>
              <?php if (!empty($banner['image_path'])): ?>
                <div class="mb-2"><img src="../<?= e($banner['image_path']) ?>" style="max-width:200px; border-radius:6px;"></div>
              <?php endif; ?>
              <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/webp">
            </div>

            <div class="mb-3">
              <label class="form-label">Link URL (optional)</label>
              <input type="text" name="link_url" class="form-control" value="<?= e($banner['link_url'] ?? '') ?>">
            </div>

            <div class="row">
              <div class="col-md-4 mb-3">
                <label class="form-label">Position</label>
                <select name="position" class="form-select">
                  <?php foreach (['hero' => 'Hero', 'header' => 'Header', 'festival' => 'Festival'] as $value => $label): ?>
                    <option value="<?= $value ?>" <?= ($banner['position'] ?? 'hero') === $value ? 'selected' : '' ?>><?= $label ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label class="form-label">Display Order</label>
                <input type="number" name="display_order" class="form-control" value="<?= (int) ($banner['display_order'] ?? 0) ?>">
              </div>
              <div class="col-md-4 mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                  <option value="active" <?= ($banner['status'] ?? 'active') === 'active' ? 'selected' : '' ?>>Active</option>
                  <option value="inactive" <?= ($banner['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Starts (optional)</label>
                <input type="date" name="starts_at" class="form-control" value="<?= e($banner['starts_at'] ?? '') ?>">
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Ends (optional)</label>
                <input type="date" name="ends_at" class="form-control" value="<?= e($banner['ends_at'] ?? '') ?>">
              </div>
            </div>

            <button type="submit" class="btn-add-cart">Save</button>
            <a href="banners.php" class="ms-2">Cancel</a>
          </form>
        </div>

      </div>
    </div>
  </div>
</body>
</html>
