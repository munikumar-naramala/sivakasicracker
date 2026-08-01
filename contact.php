<?php
require_once __DIR__ . '/config/config.php';

$activeNav = 'contact';
$pageTitle = 'Contact Us';

$errors = [];
$success = false;
$old = ['name' => '', 'email' => '', 'phone' => '', 'subject' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old = [
        'name'    => trim((string) ($_POST['name'] ?? '')),
        'email'   => trim((string) ($_POST['email'] ?? '')),
        'phone'   => trim((string) ($_POST['phone'] ?? '')),
        'subject' => trim((string) ($_POST['subject'] ?? '')),
        'message' => trim((string) ($_POST['message'] ?? '')),
    ];

    if (!csrfVerify($_POST['csrf_token'] ?? null)) {
        $errors[] = 'Your session expired, please try again.';
    } elseif (!empty($_POST['website'])) {
        // Honeypot field: invisible to real users, silently drop bot submissions.
        $success = true;
        $old = ['name' => '', 'email' => '', 'phone' => '', 'subject' => '', 'message' => ''];
    } elseif (RateLimiter::tooManyAttempts('contact_form', 5, 300)) {
        $errors[] = 'Too many messages submitted recently. Please wait a few minutes and try again.';
    } else {
        if ($old['name'] === '' || $old['message'] === '') {
            $errors[] = 'Please fill in your name and message.';
        }
        if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Please enter a valid email address.';
        }

        if (empty($errors)) {
            ContactMessage::create($old);

            // Send the notification after the page itself has been delivered to the
            // visitor (see the finishResponseAndContinue() call near the bottom of
            // this file) — the "message sent" confirmation must never wait on mail().
            $notifyData = $old;

            $success = true;
            $old = ['name' => '', 'email' => '', 'phone' => '', 'subject' => '', 'message' => ''];
        }
    }
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
      <h2>Contact Us</h2>
    </div>
  </section>

  <main id="main">
    <section class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address<span>.</span></h3>
              <p><?= nl(Setting::get('address')) ?></p>
            </div>
            <div class="info-box mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p><?= e(Setting::get('email')) ?></p>
            </div>
            <div class="info-box mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p><?= e(Setting::get('phone')) ?></p>
            </div>
          </div>

          <div class="col-lg-6">
            <?php if ($success): ?>
              <div class="form-feedback form-feedback--success">Your message has been sent. Thank you — we'll get back to you soon.</div>
            <?php endif; ?>
            <?php foreach ($errors as $error): ?>
              <div class="form-feedback form-feedback--error"><?= e($error) ?></div>
            <?php endforeach; ?>

            <form method="post" action="contact.php">
              <?= csrfField() ?>
              <input type="text" name="website" value="" style="position:absolute; left:-9999px;" tabindex="-1" autocomplete="off">

              <div class="row">
                <div class="col form-group mb-3">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required value="<?= e($old['name']) ?>">
                </div>
                <div class="col form-group mb-3">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required value="<?= e($old['email']) ?>">
                </div>
              </div>
              <div class="form-group mb-3">
                <input type="text" class="form-control" name="phone" placeholder="Phone (optional)" value="<?= e($old['phone']) ?>">
              </div>
              <div class="form-group mb-3">
                <input type="text" class="form-control" name="subject" placeholder="Subject" value="<?= e($old['subject']) ?>">
              </div>
              <div class="form-group mb-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required><?= e($old['message']) ?></textarea>
              </div>
              <div class="text-center">
                <button type="submit" class="btn-add-cart" style="padding:10px 32px;">Send Message</button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </section>
  </main>

  <?php include __DIR__ . '/includes/footer.php'; ?>

  <?php include __DIR__ . '/includes/scripts.php'; ?>

</body>

</html>
<?php
if (!empty($notifyData)) {
    $ownerEmail = Setting::get('email');
    if ($ownerEmail !== '') {
        // Page is fully rendered above — flush it to the visitor now, the
        // notification email must never make "message sent" wait on mail().
        session_write_close();
        finishResponseAndContinue();

        Mailer::send(
            $ownerEmail,
            'New Contact Message' . ($notifyData['subject'] !== '' ? ': ' . $notifyData['subject'] : ''),
            'contact-notification',
            $notifyData
        );
    }
}
