<?php
require_once __DIR__ . '/../config/config.php';
AdminAuth::requireLogin();

$activeAdminNav = 'products';
$pageTitle = 'Products';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfVerify($_POST['csrf_token'] ?? null)) {
        flash('error', 'Your session expired, please try again.');
        header('Location: products.php');
        exit;
    }

    $action = $_POST['action'] ?? '';

    if ($action === 'delete') {
        $id = (int) $_POST['id'];
        Product::delete($id);
        AuditLog::record('product.delete', 'product', $id);
        flash('success', 'Product deleted.');
    } elseif ($action === 'bulk_status') {
        $ids = array_map('intval', $_POST['ids'] ?? []);
        $status = $_POST['bulk_status_value'] ?? '';
        if (!empty($ids) && in_array($status, ['available', 'out_of_stock', 'sold_out', 'hidden'], true)) {
            Product::bulkSetStatus($ids, $status);
            AuditLog::record('product.bulk_status', 'product', null, ['ids' => $ids, 'status' => $status]);
            flash('success', count($ids) . ' product(s) updated.');
        }
    }

    header('Location: products.php?' . http_build_query($_GET));
    exit;
}

$categoryId = isset($_GET['category_id']) ? (int) $_GET['category_id'] : null;
$status = $_GET['status'] ?? null;
$search = $_GET['q'] ?? null;

$products = Product::allForAdmin($categoryId ?: null, $status ?: null, $search ?: null);
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

        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
          <form method="get" class="d-flex gap-2 flex-wrap">
            <input type="search" name="q" class="form-control" placeholder="Search name/SKU" value="<?= e($search ?? '') ?>">
            <select name="category_id" class="form-select">
              <option value="">All Categories</option>
              <?php foreach ($categories as $category): ?>
                <option value="<?= (int) $category['id'] ?>" <?= $categoryId === (int) $category['id'] ? 'selected' : '' ?>>
                  <?= e($category['name']) ?>
                </option>
              <?php endforeach; ?>
            </select>
            <select name="status" class="form-select">
              <option value="">All Statuses</option>
              <?php foreach (['available', 'out_of_stock', 'sold_out', 'hidden'] as $s): ?>
                <option value="<?= $s ?>" <?= $status === $s ? 'selected' : '' ?>><?= e(ucwords(str_replace('_', ' ', $s))) ?></option>
              <?php endforeach; ?>
            </select>
            <button type="submit" class="btn btn-outline-secondary">Filter</button>
          </form>
          <a href="product-edit.php" class="btn-add-cart" style="display:inline-flex; text-decoration:none;">+ Add Product</a>
        </div>

        <form method="post" id="bulk-form">
          <?= csrfField() ?>
          <input type="hidden" name="action" value="bulk_status">

          <div class="admin-card">
            <div class="mb-2 d-flex align-items-center gap-2">
              <select name="bulk_status_value" class="form-select" style="width:auto;">
                <option value="available">Mark Available</option>
                <option value="out_of_stock">Mark Out of Stock</option>
                <option value="sold_out">Mark Sold Out</option>
                <option value="hidden">Hide</option>
              </select>
              <button type="submit" class="btn btn-outline-secondary btn-sm">Apply to Selected</button>
            </div>

            <div class="table-responsive">
              <table class="table align-middle">
                <thead>
                  <tr>
                    <th><input type="checkbox" onclick="document.querySelectorAll('.row-check').forEach(c=>c.checked=this.checked)"></th>
                    <th>Image</th>
                    <th>SKU</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>MRP</th>
                    <th>Final Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($products as $product): ?>
                    <tr>
                      <td><input type="checkbox" class="row-check" name="ids[]" value="<?= (int) $product['id'] ?>" form="bulk-form"></td>
                      <td><img src="../<?= e($product['image_path']) ?>" style="width:40px; height:40px; object-fit:cover; border-radius:4px;"></td>
                      <td><?= e($product['sku']) ?></td>
                      <td><?= e($product['name']) ?></td>
                      <td><?= e($product['category_name']) ?></td>
                      <td><?= formatMoney((float) $product['mrp']) ?></td>
                      <td><?= formatMoney((float) $product['final_price']) ?></td>
                      <td><?= (int) $product['stock_quantity'] ?></td>
                      <td><span class="status-badge <?= $product['status'] !== 'available' ? 'status-badge--' . $product['status'] : '' ?>"><?= e(ucwords(str_replace('_', ' ', $product['status']))) ?></span></td>
                      <td class="text-end text-nowrap">
                        <a href="product-edit.php?id=<?= (int) $product['id'] ?>">Edit</a>
                        ·
                        <form method="post" action="products.php" style="display:inline;" onsubmit="return confirm('Delete this product permanently?');">
                          <?= csrfField() ?>
                          <input type="hidden" name="action" value="delete">
                          <input type="hidden" name="id" value="<?= (int) $product['id'] ?>">
                          <button type="submit" class="btn btn-link p-0 text-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  <?php if (empty($products)): ?>
                    <tr><td colspan="10" class="text-center text-muted py-4">No products found.</td></tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</body>
</html>
