<?php
/** Same $order shape as order-customer.php. Sent to the shop owner. */
?>
<!DOCTYPE html>
<html>
<body style="font-family: Arial, sans-serif; color: #333; max-width: 600px; margin: 0 auto;">
  <h2 style="color:#ea3810;">New order received: <?= e($order['order_number']) ?></h2>

  <h3>Customer</h3>
  <p>
    <?= e($order['customer_name']) ?><br>
    <?= e($order['customer_mobile']) ?><br>
    <?= e($order['customer_email']) ?><br>
    <?= nl2br(e($order['customer_address'])) ?>
  </p>

  <table width="100%" cellpadding="8" cellspacing="0" style="border-collapse: collapse; margin: 16px 0;">
    <thead>
      <tr style="background:#f4f4f4;">
        <th align="left" style="border-bottom:1px solid #ddd;">Item</th>
        <th align="center" style="border-bottom:1px solid #ddd;">Qty</th>
        <th align="right" style="border-bottom:1px solid #ddd;">Unit Price</th>
        <th align="right" style="border-bottom:1px solid #ddd;">Total</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($order['items'] as $item): ?>
        <tr>
          <td style="border-bottom:1px solid #eee;"><?= e($item['product_name_snapshot']) ?></td>
          <td align="center" style="border-bottom:1px solid #eee;"><?= (int) $item['quantity'] ?></td>
          <td align="right" style="border-bottom:1px solid #eee;"><?= formatMoney((float) $item['unit_price_snapshot']) ?></td>
          <td align="right" style="border-bottom:1px solid #eee;"><?= formatMoney((float) $item['line_total']) ?></td>
        </tr>
      <?php endforeach; ?>
      <tr>
        <td colspan="3" align="right"><strong>Total</strong></td>
        <td align="right"><strong><?= formatMoney((float) $order['total']) ?></strong></td>
      </tr>
    </tbody>
  </table>

  <p><a href="<?= e(SITE_URL) ?>/admin/order-detail.php?id=<?= (int) $order['id'] ?>">View in admin panel</a></p>
</body>
</html>
