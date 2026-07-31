<?php
require_once __DIR__ . '/config/config.php';

$activeNav = 'home';
$pageTitle = Setting::get('site_tagline', 'Sivakasi Cracker');
$businessName = Setting::get('business_name');
$aboutHeading = Setting::get('about_heading');
$aboutText = Setting::get('about_text');
$featuredProducts = Product::getFeatured(8);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include __DIR__ . '/includes/head-meta.php'; ?>
</head>

<body>

  <?php include __DIR__ . '/includes/header.php'; ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Welcome to <span><?= e($businessName) ?></span></h1>
      <h2>We are a leading online Fireworks seller in India. Through our agencies we supply to most of the states in India.</h2>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
          <h3><span>About Us</span></h3>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <h3><?= e($aboutHeading) ?></h3>
            <?php foreach (array_filter(explode("\n\n", $aboutText)) as $paragraph): ?>
              <p style="text-align:justify;"><?= nl2br(e($paragraph)) ?></p>
            <?php endforeach; ?>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <?php if (!empty($featuredProducts)): ?>
    <!-- ======= Featured Products Section ======= -->
    <section id="featured" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Featured</h2>
          <h3>Check our <span>Featured Products</span></h3>
          <p>A selection of our popular fireworks, updated by us regularly.</p>
        </div>

        <div class="product-grid">
          <?php foreach ($featuredProducts as $product): ?>
            <?php include __DIR__ . '/includes/product-card.php'; ?>
          <?php endforeach; ?>
        </div>

        <div class="text-center mt-4">
          <a href="price-list.php" class="btn-add-cart" style="display:inline-flex; text-decoration:none;">Browse Full Price List</a>
        </div>

      </div>
    </section><!-- End Featured Products Section -->
    <?php endif; ?>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <h3><span>Contact Us</span></h3>
          <p>We are available in the following address.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address<span>.</span></h3>
              <p><?= nl(Setting::get('address')) ?></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p><?= e(Setting::get('email')) ?></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us (Whatsapp)</h3>
              <p><?= nl(Setting::get('whatsapp_detail')) ?></p>
            </div>
          </div>

        </div>

        <div class="text-center mt-4">
          <a href="contact.php" class="btn-add-cart" style="display:inline-flex; text-decoration:none;">Send us a Message</a>
        </div>
      </div>
    </section>
    <!-- End Contact Section -->

  </main><!-- End #main -->

  <?php include __DIR__ . '/includes/footer.php'; ?>

  <?php include __DIR__ . '/includes/terms-section.php'; ?>

  <?php include __DIR__ . '/includes/scripts.php'; ?>

</body>

</html>
