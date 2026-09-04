<?php
require_once __DIR__ . '/config/config.php';

$activeNav = 'place-order';
$pageTitle = 'Cart';

$cartData = Cart::resolve();
$formError = $_GET['error'] ?? null;
$oldInput = $_SESSION['place_order_old_input'] ?? [];
unset($_SESSION['place_order_old_input']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include __DIR__ . '/includes/head-meta.php'; ?>
</head>

<body>

  <?php include __DIR__ . '/includes/header.php'; ?>

  <section class="breadcrumbs">
    <div class="container">
      <h2>Cart</h2>
    </div>
  </section>

  <main id="main">
    <section class="section-bg">
      <div class="container" data-aos="fade-up">

        <?php if ($formError): ?>
          <div class="form-feedback form-feedback--error"><?= e($formError) ?></div>
        <?php endif; ?>

        <?php if (empty($cartData['lines'])): ?>
          <p>Your cart is empty. <a href="price-list.php">Browse the price list</a> to add products.</p>
        <?php else: ?>

        <form method="post" action="processorder.php" id="order-form">
          <?= csrfField() ?>

          <div class="table-responsive mb-4">
            <table class="table cart-table align-middle">
              <colgroup>
                <col style="width:auto;">
                <col style="width:110px;">
                <col style="width:110px;">
                <col style="width:110px;">
                <col style="width:90px;">
              </colgroup>
              <thead>
                <tr>
                  <th>Item</th>
                  <th class="text-end">Unit Price</th>
                  <th class="text-center">Quantity</th>
                  <th class="text-end">Total</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cartData['lines'] as $line): ?>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center gap-2">
                        <img src="<?= e($line['image_path']) ?>" alt="">
                        <?= e($line['name']) ?>
                      </div>
                    </td>
                    <td class="text-end"><?= formatMoney($line['unit_price']) ?></td>
                    <td>
                      <div class="qty-stepper cart-qty-stepper" data-product-id="<?= (int) $line['product_id'] ?>">
                        <button type="button" class="qty-decrease" aria-label="Decrease quantity">&minus;</button>
                        <input type="number" name="quantity[<?= (int) $line['product_id'] ?>]" class="cart-qty-input"
                               value="<?= (int) $line['quantity'] ?>" min="0" max="999" readonly>
                        <button type="button" class="qty-increase" aria-label="Increase quantity">&plus;</button>
                      </div>
                    </td>
                    <td class="text-end fw-bold cart-line-total"><?= formatMoney($line['line_total']) ?></td>
                    <td>
                      <button type="button" class="btn btn-link p-0 text-danger remove-cart-item"
                              data-product-id="<?= (int) $line['product_id'] ?>" aria-label="Remove">&times; Remove</button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <div class="cart-summary mb-4">
            <strong id="cart-subtotal">Subtotal: <?= formatMoney($cartData['subtotal']) ?></strong>
            <div class="text-muted" style="font-size:13px;">Final total is calculated at checkout from current prices.</div>
          </div>

          <h4 class="mb-3">Your Details</h4>
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" name="name" required value="<?= e($oldInput['name'] ?? '') ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label">Mobile</label>
              <input type="tel" class="form-control" name="mobile" required value="<?= e($oldInput['mobile'] ?? '') ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" required value="<?= e($oldInput['email'] ?? '') ?>">
            </div>
            <div class="col-12">
              <label class="form-label">Delivery Address</label>
              <textarea class="form-control" name="address" rows="3" required><?= e($oldInput['address'] ?? '') ?></textarea>
            </div>
          </div>

          <button type="submit" name="place_order" value="1" class="btn-add-cart" style="padding:12px 32px;">Place Order</button>
        </form>

        <!-- Standalone form used by the per-row Remove buttons via JS (see assets/js/cart.js) -->
        <form method="post" action="api/cart-update.php" id="remove-item-form" style="display:none;">
          <?= csrfField() ?>
          <input type="hidden" name="remove_product_id" id="remove-item-product-id">
        </form>

        <?php endif; ?>

      </div>
    </section>
  </main>

  <?php include __DIR__ . '/includes/footer.php'; ?>

  <?php include __DIR__ . '/includes/scripts.php'; ?>

</body>

</html>
