<?php
require_once __DIR__ . '/../config/config.php';
AdminAuth::requireLogin();

$activeAdminNav = 'orders';
$pageTitle = 'Orders';

$status = $_GET['status'] ?? '';
$dateFrom = $_GET['date_from'] ?? '';
$dateTo = $_GET['date_to'] ?? '';

$orders = Order::allForAdmin($status ?: null, $dateFrom ?: null, $dateTo ?: null);

$statusLabels = [
    'pending'     => 'Pending',
    'confirmed'   => 'Confirmed',
    'packed'      => 'Packed',
    'dispatched'  => 'Dispatched',
    'delivered'   => 'Delivered',
    'cancelled'   => 'Cancelled',
];
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

        <form method="get" class="d-flex gap-2 flex-wrap mb-3">
          <select name="status" class="form-select" style="width:auto;">
            <option value="">All Statuses</option>
            <?php foreach ($statusLabels as $value => $label): ?>
              <option value="<?= $value ?>" <?= $status === $value ? 'selected' : '' ?>><?= $label ?></option>
            <?php endforeach; ?>
          </select>
          <input type="date" name="date_from" class="form-control" style="width:auto;" value="<?= e($dateFrom) ?>">
          <input type="date" name="date_to" class="form-control" style="width:auto;" value="<?= e($dateTo) ?>">
          <button type="submit" class="btn btn-outline-secondary">Filter</button>
        </form>

        <div class="admin-card">
          <div class="table-responsive">
            <table class="table align-middle">
              <thead>
                <tr>
                  <th>Order #</th>
                  <th>Customer</th>
                  <th>Date</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($orders as $order): ?>
                  <tr>
                    <td><?= e($order['order_number']) ?></td>
                    <td><?= e($order['customer_name']) ?><br><span class="text-muted"><?= e($order['customer_mobile']) ?></span></td>
                    <td><?= e(date('d M Y, H:i', strtotime($order['created_at']))) ?></td>
                    <td><?= formatMoney((float) $order['total']) ?></td>
                    <td><span class="status-badge"><?= e($statusLabels[$order['status']] ?? $order['status']) ?></span></td>
                    <td><a href="order-detail.php?id=<?= (int) $order['id'] ?>">View</a></td>
                  </tr>
                <?php endforeach; ?>
                <?php if (empty($orders)): ?>
                  <tr><td colspan="6" class="text-center text-muted py-4">No orders found.</td></tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>
</html>
