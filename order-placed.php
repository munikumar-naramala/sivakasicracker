<?php
require_once __DIR__ . '/config/config.php';

$activeNav = '';
$pageTitle = 'Order Placed';

$orderNumber = isset($_GET['order']) ? trim((string) $_GET['order']) : '';
$confirmedInSession = in_array($orderNumber, $_SESSION['confirmed_order_numbers'] ?? [], true);
// Order numbers are sequential/guessable, so full details (name, email, address)
// are only shown to the session that just placed this order.
$order = ($orderNumber !== '' && $confirmedInSession) ? Order::findByNumber($orderNumber) : null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include __DIR__ . '/includes/head-meta.php'; ?>
</head>

<body>

  <?php include __DIR__ . '/includes/header.php'; ?>

  <main id="main">
    <section class="section-bg py-5">
      <div class="container" data-aos="fade-up">

        <?php if ($order === null): ?>
          <div class="text-center">
            <h2>Order not found</h2>
            <p>We couldn't find that order. If you just placed an order, please check the confirmation email we sent you.</p>
            <a href="index.php" class="btn-add-cart" style="display:inline-flex; text-decoration:none;">Back to Home</a>
          </div>
        <?php else: ?>

          <div class="text-center mb-4">
            <h2>✓ Thank you, <?= e($order['customer_name']) ?>!</h2>
            <p>Your order <strong><?= e($order['order_number']) ?></strong> has been received. A confirmation email has been sent to <?= e($order['customer_email']) ?>.</p>
          </div>

          <div class="table-responsive mb-4">
            <table class="table cart-table align-middle">
              <thead>
                <tr>
                  <th>Item</th>
                  <th>Qty</th>
                  <th>Unit Price</th>
                  <th>Total</th>
                </tr>
              </thead>
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
                <tr>
                  <th colspan="3" class="text-end">Total</th>
                  <th><?= formatMoney((float) $order['total']) ?></th>
                </tr>
              </tfoot>
            </table>
          </div>

          <div class="cart-summary mb-4">
            <h4>Payment</h4>
            <p><?= nl(Setting::get('bank1_details')) ?></p>
            <p><?= nl(Setting::get('bank2_details')) ?></p>
            <p>Please confirm your payment via WhatsApp: <?= e(Setting::get('phone')) ?></p>
          </div>

          <div class="text-center">
            <a href="price-list.php" class="btn-add-cart" style="display:inline-flex; text-decoration:none;">Continue Shopping</a>
          </div>

        <?php endif; ?>

      </div>
    </section>
  </main>

  <?php include __DIR__ . '/includes/footer.php'; ?>

  <?php include __DIR__ . '/includes/scripts.php'; ?>

</body>

</html>
