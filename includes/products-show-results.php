<?php
/** The swappable results region of products-show.php. Expects $products to be set. */
?>
<?php if (empty($products)): ?>
  <p>No products found.</p>
<?php else: ?>
  <div class="product-grid">
    <?php foreach ($products as $product): ?>
      <?php include __DIR__ . '/product-card.php'; ?>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
