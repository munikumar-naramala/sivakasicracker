<?php
/**
 * Renders one product card. Expects $product (a decorated row from the
 * Product class, i.e. includes 'final_price') to be set before including.
 */
$isOrderable = $product['status'] === 'available';
?>
<div class="product-card">
  <div class="product-card__image">
    <a href="<?= e($product['image_path']) ?>" class="glightbox" data-gallery="products">
      <img src="<?= e($product['image_path']) ?>" alt="<?= e($product['name']) ?>" loading="lazy">
    </a>
  </div>
  <div class="product-card__body">
    <p class="product-card__name"><?= e($product['name']) ?></p>
    <div class="product-card__price">
      <span class="product-card__mrp"><?= formatMoney((float) $product['mrp']) ?></span>
      <span class="product-card__final"><?= formatMoney((float) $product['final_price']) ?></span>
    </div>

    <?php if ($product['status'] === 'out_of_stock'): ?>
      <span class="status-badge status-badge--out_of_stock">Out of Stock</span>
    <?php elseif ($product['status'] === 'sold_out'): ?>
      <span class="status-badge status-badge--sold_out">Sold Out</span>
    <?php endif; ?>

    <?php if ($isOrderable): ?>
      <form class="add-to-cart-form d-flex align-items-center gap-2" action="api/cart-add.php" method="post">
        <?= csrfField() ?>
        <input type="hidden" name="product_id" value="<?= (int) $product['id'] ?>">
        <div class="qty-stepper">
          <button type="button" class="qty-decrease" aria-label="Decrease quantity">&minus;</button>
          <input type="number" name="quantity" value="1" min="1" max="999">
          <button type="button" class="qty-increase" aria-label="Increase quantity">&plus;</button>
        </div>
        <button type="submit" class="btn-add-cart">Add to Cart</button>
      </form>
    <?php endif; ?>
  </div>
</div>
