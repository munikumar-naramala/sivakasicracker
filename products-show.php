<?php
require_once __DIR__ . '/config/config.php';

$activeNav = 'products-show';
$pageTitle = 'Product Gallery';

$categorySlug = isset($_GET['category']) ? trim((string) $_GET['category']) : null;
$products = Product::getAllVisible($categorySlug ?: null);
$categories = Category::allActive();
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
      <h2>Product Gallery</h2>
    </div>
  </section>

  <main id="main">
    <section class="section-bg">
      <div class="container" data-aos="fade-up">

        <div class="category-chips">
          <a href="products-show.php" class="category-chip <?= $categorySlug === null ? 'active' : '' ?>">All</a>
          <?php foreach ($categories as $category): ?>
            <a href="products-show.php?category=<?= e($category['slug']) ?>"
               class="category-chip <?= $categorySlug === $category['slug'] ? 'active' : '' ?>">
              <?= e($category['name']) ?>
            </a>
          <?php endforeach; ?>
        </div>

        <?php if (empty($products)): ?>
          <p>No products found.</p>
        <?php else: ?>
          <div class="product-grid">
            <?php foreach ($products as $product): ?>
              <?php include __DIR__ . '/includes/product-card.php'; ?>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

      </div>
    </section>
  </main>

  <?php include __DIR__ . '/includes/footer.php'; ?>

  <?php include __DIR__ . '/includes/scripts.php'; ?>

</body>

</html>
