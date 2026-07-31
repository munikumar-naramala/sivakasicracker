<?php
/** Shared footer for every public page. */
$businessName = Setting::get('business_name', 'Sivakasi Cracker');
$address = Setting::get('address');
$phone = Setting::get('phone');
$whatsapp = Setting::get('whatsapp');
$email = Setting::get('email');
$footerText = Setting::get('footer_text', $businessName . '. All Rights Reserved');
$bank1 = Setting::get('bank1_details');
$bank2 = Setting::get('bank2_details');
?>
<!-- ======= Footer ======= -->
<footer id="footer">

  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-3 footer-contact">
          <h3><?= e($businessName) ?><span>.</span></h3>
          <p>
            <?= nl($address) ?><br><br>
            <strong>Phone:</strong> <?= e($phone) ?><br>
            <strong>Whatsapp:</strong> <?= e($phone) ?><br>
            <strong>Email:</strong> <?= e($email) ?><br>
          </p>
        </div>

        <div class="col-lg-3 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="index.php#hero">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="index.php#about">About us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="index.php#team">Terms & Conditions</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="price-list.php">Price List</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="place-order.php">Place Order</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-3 footer-links">
          <h5>Payment Details</h5>
          <p><?= nl($bank1) ?></p>
        </div>

        <div class="col-lg-3 col-md-3 footer-links">
          <h5>&nbsp;</h5>
          <p><?= nl($bank2) ?></p>
        </div>

      </div>
    </div>
  </div>

  <div class="container py-4">
    <div class="copyright">
      &copy; Copyright <strong><span><?= e($businessName) ?></span></strong>. <?= e($footerText) ?>
    </div>
  </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<?php if ($whatsapp !== ''): ?>
<a href="https://wa.me/<?= e($whatsapp) ?>" class="whatsapp-float" target="_blank" rel="noopener" aria-label="Chat on WhatsApp">
  <i class="bi bi-whatsapp"></i>
</a>
<?php endif; ?>
