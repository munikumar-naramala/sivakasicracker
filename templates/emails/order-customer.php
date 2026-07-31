<?php
/**
 * Expects: $order (order_number, customer_name, customer_mobile, customer_address, total, items)
 * $businessName, $bank1, $bank2, $whatsapp
 * All values must be escaped here — this file is the only place they're echoed.
 */
?>
<!DOCTYPE html>
<html>
<body style="font-family: Arial, sans-serif; color: #333; max-width: 600px; margin: 0 auto;">
  <h2 style="color:#ea3810;">Thank you for your order, <?= e($order['customer_name']) ?>!</h2>
  <p>Your order <strong><?= e($order['order_number']) ?></strong> has been received.</p>

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

  <h3>Delivery Details</h3>
  <p>
    <?= e($order['customer_name']) ?><br>
    <?= e($order['customer_mobile']) ?><br>
    <?= nl2br(e($order['customer_address'])) ?>
  </p>

  <h3>Payment</h3>
  <p><?= nl2br(e($bank1)) ?></p>
  <p><?= nl2br(e($bank2)) ?></p>

  <p>Please confirm your payment via WhatsApp: <?= e($whatsapp) ?></p>

  <p style="color:#888; font-size:12px;">— <?= e($businessName) ?></p>
</body>
</html>
