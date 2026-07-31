<?php
require_once __DIR__ . '/../config/config.php';
AdminAuth::requireLogin();

$activeAdminNav = 'orders';

$id = (int) ($_GET['id'] ?? 0);
$order = Order::find($id);
if (!$order) {
    flash('error', 'Order not found.');
    header('Location: orders.php');
    exit;
}

$statusOptions = ['pending', 'confirmed', 'packed', 'dispatched', 'delivered', 'cancelled'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfVerify($_POST['csrf_token'] ?? null)) {
        flash('error', 'Your session expired, please try again.');
    } else {
        $newStatus = $_POST['status'] ?? '';
        $notes = trim((string) ($_POST['admin_notes'] ?? ''));
        if (in_array($newStatus, $statusOptions, true)) {
            Order::updateStatus($id, $newStatus, $notes);
            AuditLog::record('order.status_change', 'order', $id, ['status' => $newStatus]);
            flash('success', 'Order updated.');
        }
    }
    header('Location: order-detail.php?id=' . $id);
    exit;
}

$pageTitle = 'Order ' . $order['order_number'];
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

        <div class="row g-3">
          <div class="col-md-7">
            <div class="admin-card">
              <h6>Items</h6>
              <table class="table align-middle">
                <thead><tr><th>Item</th><th>Qty</th><th>Unit Price</th><th>Total</th></tr></thead>
                <tbody>
                  <?php foreach ($order['items'] as $item): ?>
                    <tr>
                      <td><?= e($item['product_name_snapshot']) ?></td>
                      <td><?= (int) $item['quantity'] ?></td>
                      <td><?= formatMoney((float) $item['unit_price_snapshot']) ?></td>
                      <td><?= formatMoney((float) $item['line_total']) ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr><th colspan="3" class="text-end">Total</th><th><?= formatMoney((float) $order['total']) ?></th></tr>
                </tfoot>
              </table>
            </div>
          </div>

          <div class="col-md-5">
            <div class="admin-card">
              <h6>Customer</h6>
              <p>
                <?= e($order['customer_name']) ?><br>
                <?= e($order['customer_mobile']) ?><br>
                <?= e($order['customer_email']) ?><br>
                <?= nl2br(e($order['customer_address'])) ?>
              </p>
            </div>

            <div class="admin-card">
              <h6>Status</h6>
              <form method="post">
                <?= csrfField() ?>
                <div class="mb-3">
                  <select name="status" class="form-select">
                    <?php foreach ($statusOptions as $option): ?>
                      <option value="<?= $option ?>" <?= $order['status'] === $option ? 'selected' : '' ?>><?= e(ucfirst($option)) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Admin Notes</label>
                  <textarea name="admin_notes" class="form-control" rows="3"><?= e($order['admin_notes'] ?? '') ?></textarea>
                </div>
                <button type="submit" class="btn-add-cart">Save Status</button>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>
</html>
