<?php
/**
 * Shared topbar + header/nav for every public page.
 * Expects (optional): $activeNav string — one of home|price-list|products-show|place-order
 */
$activeNav = $activeNav ?? '';
$businessName = Setting::get('business_name', 'Sivakasi Cracker');
$phone = Setting::get('phone');
$email = Setting::get('email');
$whatsapp = Setting::get('whatsapp');
$cartCount = class_exists('Cart') ? Cart::count() : 0;

function navClass(string $key, string $active): string
{
    return 'nav-link scrollto' . ($key === $active ? ' active' : '');
}
?>
<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
  <div class="container d-flex justify-content-center justify-content-md-between">
    <div class="contact-info d-flex align-items-center">
      <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:<?= e($email) ?>"><?= e($email) ?></a></i>
      <i class="bi bi-phone d-flex align-items-center ms-4"><span><?= e($phone) ?></span></i>
    </div>
    <div class="social-links d-none d-md-flex align-items-center">
      <?php foreach (['facebook', 'twitter', 'instagram', 'linkedin'] as $network): ?>
        <?php $url = Setting::get('social_' . $network); ?>
        <?php if ($url !== ''): ?>
          <a href="<?= e($url) ?>" class="<?= $network ?>"><i class="bi bi-<?= $network ?>"></i></a>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">

    <h1 class="logo"><a href="index.php"><?= e($businessName) ?></a></h1>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="<?= navClass('home', $activeNav) ?>" href="index.php#hero">Home</a></li>
        <li><a class="<?= navClass('about', $activeNav) ?>" href="index.php#about">About Us</a></li>
        <li><a class="<?= navClass('price-list', $activeNav) ?>" href="price-list.php">Price List</a></li>
        <li><a class="<?= navClass('products-show', $activeNav) ?>" href="products-show.php">Product Gallery</a></li>
        <li><a class="<?= navClass('contact', $activeNav) ?>" href="contact.php">Contact</a></li>
        <li><a class="<?= navClass('place-order', $activeNav) ?>" href="place-order.php">
          Cart <span class="cart-badge" style="<?= $cartCount > 0 ? '' : 'display:none;' ?>"><?= (int) $cartCount ?></span>
        </a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->
