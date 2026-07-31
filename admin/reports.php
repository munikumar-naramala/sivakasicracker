<?php
require_once __DIR__ . '/../config/config.php';
AdminAuth::requireLogin();

$dateFrom = $_GET['date_from'] ?? date('Y-m-01');
$dateTo = $_GET['date_to'] ?? date('Y-m-d');

if (($_GET['export'] ?? '') === 'orders_csv') {
    $orders = Order::allForAdmin(null, $dateFrom, $dateTo);
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="orders_' . $dateFrom . '_to_' . $dateTo . '.csv"');
    $out = fopen('php://output', 'w');
    fputcsv($out, ['Order Number', 'Date', 'Customer', 'Mobile', 'Email', 'Status', 'Total']);
    foreach ($orders as $order) {
        fputcsv($out, [
            $order['order_number'], $order['created_at'], $order['customer_name'],
            $order['customer_mobile'], $order['customer_email'], $order['status'], $order['total'],
        ]);
    }
    fclose($out);
    exit;
}

if (($_GET['export'] ?? '') === 'low_stock_csv') {
    $products = Product::lowStock(10);
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="low_stock.csv"');
    $out = fopen('php://output', 'w');
    fputcsv($out, ['SKU', 'Name', 'Category', 'Stock Qty', 'Status']);
    foreach ($products as $product) {
        fputcsv($out, [$product['sku'], $product['name'], $product['category_name'], $product['stock_quantity'], $product['status']]);
    }
    fclose($out);
    exit;
}

$activeAdminNav = 'reports';
$pageTitle = 'Reports';

$revenue = Order::revenueBetween($dateFrom, $dateTo);
$orderCount = Order::countBetween($dateFrom, $dateTo);
$topProducts = Order::mostOrderedProductsBetween($dateFrom, $dateTo, 10);
$lowStock = Product::lowStock(10);
$ordersInRange = Order::allForAdmin(null, $dateFrom, $dateTo);
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

        <form method="get" class="d-flex gap-2 flex-wrap mb-4">
          <input type="date" name="date_from" class="form-control" style="width:auto;" value="<?= e($dateFrom) ?>">
          <input type="date" name="date_to" class="form-control" style="width:auto;" value="<?= e($dateTo) ?>">
          <button type="submit" class="btn btn-outline-secondary">Apply</button>
          <a href="reports.php?date_from=<?= e($dateFrom) ?>&date_to=<?= e($dateTo) ?>&export=orders_csv" class="btn btn-outline-secondary">Export Orders CSV</a>
        </form>

        <div class="row g-3 mb-4">
          <div class="col-md-3 col-6">
            <div class="stat-tile">
              <div class="label">Orders in Range</div>
              <div class="value"><?= (int) $orderCount ?></div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="stat-tile">
              <div class="label">Revenue in Range</div>
              <div class="value"><?= formatMoney($revenue) ?></div>
            </div>
          </div>
        </div>

        <div class="row g-3">
          <div class="col-md-6">
            <div class="admin-card">
              <h6>Top Selling Products</h6>
              <?php if (empty($topProducts)): ?>
                <p class="text-muted mb-0">No orders in this range.</p>
              <?php else: ?>
                <table class="table table-sm">
                  <thead><tr><th>Product</th><th>Qty</th><th>Revenue</th></tr></thead>
                  <tbody>
                    <?php foreach ($topProducts as $row): ?>
                      <tr>
                        <td><?= e($row['name']) ?></td>
                        <td><?= (int) $row['total_quantity'] ?></td>
                        <td><?= formatMoney((float) $row['total_revenue']) ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              <?php endif; ?>
            </div>
          </div>

          <div class="col-md-6">
            <div class="admin-card">
              <div class="d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Low Stock (&le; 10)</h6>
                <a href="reports.php?export=low_stock_csv" class="btn btn-outline-secondary btn-sm">Export CSV</a>
              </div>
              <?php if (empty($lowStock)): ?>
                <p class="text-muted mb-0 mt-2">Nothing low on stock.</p>
              <?php else: ?>
                <table class="table table-sm mt-2">
                  <thead><tr><th>Product</th><th>Category</th><th>Stock</th></tr></thead>
                  <tbody>
                    <?php foreach ($lowStock as $product): ?>
                      <tr>
                        <td><?= e($product['name']) ?></td>
                        <td><?= e($product['category_name']) ?></td>
                        <td><?= (int) $product['stock_quantity'] ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="admin-card mt-3">
          <h6>Orders by Date (<?= e($dateFrom) ?> to <?= e($dateTo) ?>)</h6>
          <table class="table table-sm">
            <thead><tr><th>Order #</th><th>Date</th><th>Customer</th><th>Status</th><th>Total</th></tr></thead>
            <tbody>
              <?php foreach ($ordersInRange as $order): ?>
                <tr>
                  <td><a href="order-detail.php?id=<?= (int) $order['id'] ?>"><?= e($order['order_number']) ?></a></td>
                  <td><?= e(date('d M Y', strtotime($order['created_at']))) ?></td>
                  <td><?= e($order['customer_name']) ?></td>
                  <td><?= e(ucfirst($order['status'])) ?></td>
                  <td><?= formatMoney((float) $order['total']) ?></td>
                </tr>
              <?php endforeach; ?>
              <?php if (empty($ordersInRange)): ?>
                <tr><td colspan="5" class="text-center text-muted py-3">No orders in this range.</td></tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</body>
</html>
