<?php
require_once __DIR__ . '/config/config.php';

$activeNav = 'place-order';
$pageTitle = 'Place Order';

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
      <h2>Place Order</h2>
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

        <form method="post" action="processorder.php">
          <?= csrfField() ?>

          <div class="table-responsive mb-4">
            <table class="table cart-table align-middle">
              <thead>
                <tr>
                  <th>Item</th>
                  <th>Unit Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cartData['lines'] as $line): ?>
                  <tr>
                    <td class="d-flex align-items-center gap-2">
                      <img src="<?= e($line['image_path']) ?>" alt="">
                      <?= e($line['name']) ?>
                    </td>
                    <td><?= formatMoney($line['unit_price']) ?></td>
                    <td style="max-width:90px;">
                      <input type="number" class="form-control" name="quantity[<?= (int) $line['product_id'] ?>]"
                             value="<?= (int) $line['quantity'] ?>" min="0" max="999">
                    </td>
                    <td><?= formatMoney($line['line_total']) ?></td>
                    <td></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <p class="text-muted">Tip: set a quantity to 0 and click "Place Order" to remove that item.</p>

          <div class="cart-summary mb-4">
            <strong>Subtotal: <?= formatMoney($cartData['subtotal']) ?></strong>
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

        <?php endif; ?>

      </div>
    </section>
  </main>

  <?php include __DIR__ . '/includes/footer.php'; ?>

  <?php include __DIR__ . '/includes/scripts.php'; ?>

</body>

</html>
