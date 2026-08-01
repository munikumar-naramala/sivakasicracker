<?php
require_once __DIR__ . '/config/config.php';

$activeNav = 'products-show';
$pageTitle = 'Product Gallery';

$categorySlug = isset($_GET['category']) ? trim((string) $_GET['category']) : null;
$products = Product::getAllVisible($categorySlug ?: null);
$categories = Category::allActive();

$isAjax = ($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'XMLHttpRequest';
if ($isAjax) {
    include __DIR__ . '/includes/products-show-results.php';
    exit;
}
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

        <div class="category-chips" data-ajax-nav>
          <a href="products-show.php" class="category-chip <?= $categorySlug === null ? 'active' : '' ?>">All</a>
          <?php foreach ($categories as $category): ?>
            <a href="products-show.php?category=<?= e($category['slug']) ?>"
               class="category-chip <?= $categorySlug === $category['slug'] ? 'active' : '' ?>">
              <?= e($category['name']) ?>
            </a>
          <?php endforeach; ?>
        </div>

        <div id="ajax-results">
          <?php include __DIR__ . '/includes/products-show-results.php'; ?>
        </div>

      </div>
    </section>
  </main>

  <?php include __DIR__ . '/includes/footer.php'; ?>

  <?php include __DIR__ . '/includes/scripts.php'; ?>

</body>

</html>
