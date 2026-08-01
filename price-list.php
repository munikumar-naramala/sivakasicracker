<?php
require_once __DIR__ . '/config/config.php';

$activeNav = 'price-list';
$pageTitle = 'Price List';

$categorySlug = isset($_GET['category']) ? trim((string) $_GET['category']) : null;
$searchQuery = isset($_GET['q']) ? trim((string) $_GET['q']) : '';

if ($searchQuery !== '') {
    $products = Product::search($searchQuery);
} else {
    $products = Product::getAllVisible($categorySlug ?: null);
}

$categories = Category::allActive();

// Group products by category for display (search results stay ungrouped/flat).
$grouped = [];
if ($searchQuery === '') {
    foreach ($products as $product) {
        $grouped[$product['category_name']][] = $product;
    }
}

// Category-switch requests fetch just the results region via AJAX (see
// assets/js/cart.js) instead of a full page reload — avoids re-downloading
// header/footer/vendor CSS+JS and re-running page setup for every click.
$isAjax = ($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'XMLHttpRequest';
if ($isAjax) {
    include __DIR__ . '/includes/price-list-results.php';
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
      <div class="d-flex justify-content-between align-items-center flex-wrap">
        <h2>Price List</h2>
      </div>
    </div>
  </section>

  <main id="main">
    <section class="section-bg">
      <div class="container" data-aos="fade-up">

        <form method="get" class="row g-2 mb-4">
          <div class="col-md-6">
            <input type="search" name="q" class="form-control" placeholder="Search products..." value="<?= e($searchQuery) ?>">
          </div>
          <div class="col-md-3">
            <button type="submit" class="btn-add-cart" style="width:100%;">Search</button>
          </div>
        </form>

        <div class="category-chips" data-ajax-nav>
          <a href="price-list.php" class="category-chip <?= $categorySlug === null && $searchQuery === '' ? 'active' : '' ?>">All</a>
          <?php foreach ($categories as $category): ?>
            <a href="price-list.php?category=<?= e($category['slug']) ?>"
               class="category-chip <?= $categorySlug === $category['slug'] ? 'active' : '' ?>">
              <?= e($category['name']) ?>
            </a>
          <?php endforeach; ?>
        </div>

        <div id="ajax-results">
          <?php include __DIR__ . '/includes/price-list-results.php'; ?>
        </div>

        <div class="text-center mt-5">
          <a href="place-order.php" class="btn-add-cart" style="display:inline-flex; text-decoration:none;">Go to Cart</a>
        </div>

      </div>
    </section>
  </main>

  <?php include __DIR__ . '/includes/footer.php'; ?>

  <?php include __DIR__ . '/includes/scripts.php'; ?>

</body>

</html>
