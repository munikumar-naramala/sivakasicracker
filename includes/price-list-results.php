<?php
/**
 * The swappable results region of price-list.php. Expects $products, $grouped,
 * $searchQuery to be set. Rendered both for a normal page load and, standalone,
 * for the AJAX category-switch request (see the AJAX branch in price-list.php).
 */
?>
<?php if (empty($products)): ?>
  <p>No products found<?= $searchQuery !== '' ? ' for "' . e($searchQuery) . '"' : '' ?>.</p>
<?php elseif ($searchQuery !== ''): ?>
  <h4 class="mb-3">Search results for "<?= e($searchQuery) ?>"</h4>
  <div class="product-grid">
    <?php foreach ($products as $product): ?>
      <?php include __DIR__ . '/product-card.php'; ?>
    <?php endforeach; ?>
  </div>
<?php else: ?>
  <?php foreach ($grouped as $categoryName => $categoryProducts): ?>
    <h4 class="mt-4 mb-3"><?= e($categoryName) ?> <span class="text-muted">(<?= count($categoryProducts) ?>)</span></h4>
    <div class="product-grid">
      <?php foreach ($categoryProducts as $product): ?>
        <?php include __DIR__ . '/product-card.php'; ?>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
