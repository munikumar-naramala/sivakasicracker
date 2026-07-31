<?php
require_once __DIR__ . '/../config/config.php';
AdminAuth::requireLogin();

$activeAdminNav = 'products';

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
$product = $id ? Product::find($id) : null;
if ($id && !$product) {
    flash('error', 'Product not found.');
    header('Location: products.php');
    exit;
}

$pageTitle = $product ? 'Edit Product' : 'Add Product';
$categories = Category::allActive();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfVerify($_POST['csrf_token'] ?? null)) {
        $errors[] = 'Your session expired, please try again.';
    } else {
        $name = trim((string) ($_POST['name'] ?? ''));
        $categoryId = (int) ($_POST['category_id'] ?? 0);
        $description = trim((string) ($_POST['description'] ?? ''));
        $mrp = filter_var($_POST['mrp'] ?? '', FILTER_VALIDATE_FLOAT);
        $discountPercent = trim((string) ($_POST['discount_percent'] ?? ''));
        $stock = (int) ($_POST['stock_quantity'] ?? 0);
        $status = $_POST['status'] ?? 'available';
        $displayOrder = (int) ($_POST['display_order'] ?? 0);
        $isFeatured = !empty($_POST['is_featured']);
        $imagePath = $product['image_path'] ?? null;

        if ($name === '') $errors[] = 'Name is required.';
        if (!$categoryId) $errors[] = 'Category is required.';
        if ($mrp === false || $mrp <= 0) $errors[] = 'MRP must be a positive number.';
        if ($discountPercent !== '' && (!is_numeric($discountPercent) || $discountPercent < 0 || $discountPercent > 100)) {
            $errors[] = 'Discount % must be between 0 and 100.';
        }
        if (!in_array($status, ['available', 'out_of_stock', 'sold_out', 'hidden'], true)) {
            $errors[] = 'Invalid status.';
        }

        if (empty($errors) && !empty($_FILES['image']['name'])) {
            try {
                $imagePath = Uploader::handleImage($_FILES['image'], 'products');
            } catch (RuntimeException $e) {
                $errors[] = $e->getMessage();
            }
        } elseif (!$product && empty($imagePath)) {
            $errors[] = 'Please upload a product image.';
        }

        if (empty($errors)) {
            $data = [
                'sku'              => $product['sku'] ?? ('SC-' . strtoupper(bin2hex(random_bytes(4)))),
                'name'             => $name,
                'slug'             => $product['slug'] ?? (slugify($name) . '-' . bin2hex(random_bytes(2))),
                'category_id'      => $categoryId,
                'description'      => $description,
                'mrp'              => $mrp,
                'discount_percent' => $discountPercent,
                'image_path'       => $imagePath,
                'stock_quantity'   => $stock,
                'status'           => $status,
                'display_order'    => $displayOrder,
                'is_featured'      => $isFeatured,
            ];

            if ($product) {
                Product::update($id, $data);
                AuditLog::record('product.update', 'product', $id, $data);
                flash('success', 'Product updated.');
            } else {
                $newId = Product::create($data);
                AuditLog::record('product.create', 'product', $newId, $data);
                flash('success', 'Product created.');
            }

            header('Location: products.php');
            exit;
        }
    }
}

$globalDiscount = Setting::globalDiscountPercent();
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

        <div class="admin-card" style="max-width:700px;">
          <form method="post" enctype="multipart/form-data">
            <?= csrfField() ?>

            <div class="row">
              <div class="col-md-8 mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" required value="<?= e($product['name'] ?? '') ?>">
              </div>
              <div class="col-md-4 mb-3">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-select" required>
                  <option value="">Select...</option>
                  <?php foreach ($categories as $category): ?>
                    <option value="<?= (int) $category['id'] ?>" <?= (int) ($product['category_id'] ?? 0) === (int) $category['id'] ? 'selected' : '' ?>>
                      <?= e($category['name']) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Description</label>
              <textarea name="description" class="form-control" rows="3"><?= e($product['description'] ?? '') ?></textarea>
            </div>

            <div class="row">
              <div class="col-md-4 mb-3">
                <label class="form-label">MRP (₹)</label>
                <input type="number" step="0.01" name="mrp" id="mrp" class="form-control" required value="<?= e($product['mrp'] ?? '') ?>">
              </div>
              <div class="col-md-4 mb-3">
                <label class="form-label">Discount % <span class="text-muted">(blank = global <?= e($globalDiscount) ?>%)</span></label>
                <input type="number" step="0.01" min="0" max="100" name="discount_percent" id="discount_percent" class="form-control"
                       value="<?= e($product['discount_percent'] ?? '') ?>">
              </div>
              <div class="col-md-4 mb-3">
                <label class="form-label">Final Price Preview</label>
                <input type="text" id="final-price-preview" class="form-control" disabled>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Image <?= $product ? '(leave blank to keep current)' : '' ?></label>
              <?php if (!empty($product['image_path'])): ?>
                <div class="mb-2"><img src="../<?= e($product['image_path']) ?>" style="max-width:120px; border-radius:6px;"></div>
              <?php endif; ?>
              <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/webp">
            </div>

            <div class="row">
              <div class="col-md-3 mb-3">
                <label class="form-label">Stock Qty</label>
                <input type="number" name="stock_quantity" class="form-control" value="<?= (int) ($product['stock_quantity'] ?? 0) ?>">
              </div>
              <div class="col-md-3 mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                  <?php foreach (['available' => 'Available', 'out_of_stock' => 'Out of Stock', 'sold_out' => 'Sold Out', 'hidden' => 'Hidden'] as $value => $label): ?>
                    <option value="<?= $value ?>" <?= ($product['status'] ?? 'available') === $value ? 'selected' : '' ?>><?= $label ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-3 mb-3">
                <label class="form-label">Display Order</label>
                <input type="number" name="display_order" class="form-control" value="<?= (int) ($product['display_order'] ?? 0) ?>">
              </div>
              <div class="col-md-3 mb-3 d-flex align-items-end">
                <div class="form-check">
                  <input type="checkbox" name="is_featured" id="is_featured" class="form-check-input" <?= !empty($product['is_featured']) ? 'checked' : '' ?>>
                  <label class="form-check-label" for="is_featured">Featured Product</label>
                </div>
              </div>
            </div>

            <button type="submit" class="btn-add-cart">Save</button>
            <a href="products.php" class="ms-2">Cancel</a>
          </form>
        </div>

      </div>
    </div>
  </div>

  <script>
    const mrpInput = document.getElementById('mrp');
    const discountInput = document.getElementById('discount_percent');
    const preview = document.getElementById('final-price-preview');
    const globalDiscount = <?= json_encode($globalDiscount) ?>;

    function updatePreview() {
      const mrp = parseFloat(mrpInput.value) || 0;
      const discount = discountInput.value !== '' ? parseFloat(discountInput.value) : globalDiscount;
      const final = mrp * (1 - discount / 100);
      preview.value = '₹' + final.toFixed(2);
    }
    mrpInput.addEventListener('input', updatePreview);
    discountInput.addEventListener('input', updatePreview);
    updatePreview();
  </script>
</body>
</html>
