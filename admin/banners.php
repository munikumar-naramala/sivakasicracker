<?php
require_once __DIR__ . '/../config/config.php';
AdminAuth::requireLogin();

$activeAdminNav = 'banners';
$pageTitle = 'Banners';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete') {
    if (csrfVerify($_POST['csrf_token'] ?? null)) {
        $id = (int) $_POST['id'];
        Banner::delete($id);
        AuditLog::record('banner.delete', 'banner', $id);
        flash('success', 'Banner deleted.');
    }
    header('Location: banners.php');
    exit;
}

$banners = Banner::all();
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

        <div class="d-flex justify-content-end mb-3">
          <a href="banner-edit.php" class="btn-add-cart" style="display:inline-flex; text-decoration:none;">+ Add Banner</a>
        </div>

        <div class="admin-card">
          <table class="table align-middle">
            <thead>
              <tr><th>Image</th><th>Title</th><th>Position</th><th>Order</th><th>Status</th><th>Schedule</th><th></th></tr>
            </thead>
            <tbody>
              <?php foreach ($banners as $banner): ?>
                <tr>
                  <td><img src="../<?= e($banner['image_path']) ?>" style="width:60px; height:36px; object-fit:cover; border-radius:4px;"></td>
                  <td><?= e($banner['title']) ?></td>
                  <td><?= e(ucfirst($banner['position'])) ?></td>
                  <td><?= (int) $banner['display_order'] ?></td>
                  <td><span class="status-badge <?= $banner['status'] === 'active' ? '' : 'status-badge--out_of_stock' ?>"><?= e(ucfirst($banner['status'])) ?></span></td>
                  <td class="text-muted" style="font-size:12px;">
                    <?= e($banner['starts_at'] ?? '—') ?> to <?= e($banner['ends_at'] ?? '—') ?>
                  </td>
                  <td class="text-end">
                    <a href="banner-edit.php?id=<?= (int) $banner['id'] ?>">Edit</a>
                    ·
                    <form method="post" action="banners.php" style="display:inline;" onsubmit="return confirm('Delete this banner?');">
                      <?= csrfField() ?>
                      <input type="hidden" name="action" value="delete">
                      <input type="hidden" name="id" value="<?= (int) $banner['id'] ?>">
                      <button type="submit" class="btn btn-link p-0 text-danger">Delete</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
              <?php if (empty($banners)): ?>
                <tr><td colspan="7" class="text-center text-muted py-4">No banners yet.</td></tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</body>
</html>
