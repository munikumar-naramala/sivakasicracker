<?php
require_once __DIR__ . '/../config/config.php';
AdminAuth::requireLogin();

$activeAdminNav = 'dashboard';
$pageTitle = 'Dashboard';

$todayOrders = Order::countToday();
$pendingOrders = Order::countPending();
$revenueToday = Order::revenueToday();
$outOfStock = Product::outOfStockCount();
$mostOrdered = Order::mostOrderedProducts(5);
$recentProducts = Product::recentlyAdded(5);
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

        <div class="row g-3 mb-4">
          <div class="col-md-3 col-6">
            <div class="stat-tile">
              <div class="label">Today's Orders</div>
              <div class="value"><?= (int) $todayOrders ?></div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="stat-tile">
              <div class="label">Pending Orders</div>
              <div class="value"><?= (int) $pendingOrders ?></div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="stat-tile">
              <div class="label">Today's Revenue</div>
              <div class="value"><?= formatMoney($revenueToday) ?></div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="stat-tile">
              <div class="label">Out of Stock</div>
              <div class="value"><?= (int) $outOfStock ?></div>
            </div>
          </div>
        </div>

        <div class="row g-3">
          <div class="col-md-6">
            <div class="admin-card">
              <h6>Most Ordered Products</h6>
              <?php if (empty($mostOrdered)): ?>
                <p class="text-muted mb-0">No orders yet.</p>
              <?php else: ?>
                <ol class="mb-0">
                  <?php foreach ($mostOrdered as $row): ?>
                    <li><?= e($row['name']) ?> (<?= (int) $row['total_quantity'] ?>)</li>
                  <?php endforeach; ?>
                </ol>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="admin-card">
              <h6>Recently Added Products</h6>
              <?php if (empty($recentProducts)): ?>
                <p class="text-muted mb-0">No products yet.</p>
              <?php else: ?>
                <ul class="mb-0">
                  <?php foreach ($recentProducts as $product): ?>
                    <li><?= e($product['name']) ?> <span class="text-muted">(<?= e($product['category_name']) ?>)</span></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="admin-card">
          <a href="orders.php?status=pending">View Pending Orders →</a> ·
          <a href="products.php?status=out_of_stock">View Out-of-Stock Products →</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
