<?php
require_once __DIR__ . '/../config/config.php';
AdminAuth::requireLogin();

$activeAdminNav = 'settings';
$pageTitle = 'Website Settings';

$fields = [
    'business_name'           => ['Business Name', 'text'],
    'site_tagline'             => ['Site Tagline', 'text'],
    'phone'                    => ['Phone', 'text'],
    'whatsapp'                 => ['WhatsApp Number (digits only, e.g. 919597994120)', 'text'],
    'whatsapp_detail'          => ['WhatsApp Contact Detail (multi-line)', 'textarea'],
    'email'                    => ['Email', 'text'],
    'address'                  => ['Address (multi-line)', 'textarea'],
    'footer_text'              => ['Footer Text', 'text'],
    'social_facebook'          => ['Facebook URL', 'text'],
    'social_twitter'           => ['Twitter URL', 'text'],
    'social_instagram'         => ['Instagram URL', 'text'],
    'social_linkedin'          => ['LinkedIn URL', 'text'],
    'global_discount_percent'  => ['Global Discount %', 'text'],
    'bank1_details'            => ['Bank Account 1 (multi-line)', 'textarea'],
    'bank2_details'            => ['Bank Account 2 (multi-line)', 'textarea'],
    'terms_conditions'         => ['Terms & Conditions (one per line)', 'textarea'],
    'about_heading'            => ['About Heading', 'text'],
    'about_text'               => ['About Text (multi-line, blank line = new paragraph)', 'textarea'],
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfVerify($_POST['csrf_token'] ?? null)) {
        flash('error', 'Your session expired, please try again.');
    } else {
        foreach (array_keys($fields) as $key) {
            if (isset($_POST[$key])) {
                Setting::set($key, trim((string) $_POST[$key]));
            }
        }
        AuditLog::record('settings.update');
        flash('success', 'Settings saved.');
    }
    header('Location: settings.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include __DIR__ . '/includes/head.php'; ?>
</head>
<body class="admin-body">
  <div class="admin-shell">
    <?php include __DIR__ . '/includes/sidebar.php'; ?>
    <div class="admin-main">
      <?php include __DIR__ . '/includes/topbar.php'; ?>
      <div class="admin-content">
        <?php include __DIR__ . '/includes/flashes.php'; ?>

        <div class="admin-card" style="max-width:800px;">
          <form method="post">
            <?= csrfField() ?>
            <?php foreach ($fields as $key => [$label, $type]): ?>
              <div class="mb-3">
                <label class="form-label"><?= e($label) ?></label>
                <?php if ($type === 'textarea'): ?>
                  <textarea name="<?= $key ?>" class="form-control" rows="4"><?= e(Setting::get($key)) ?></textarea>
                <?php else: ?>
                  <input type="text" name="<?= $key ?>" class="form-control" value="<?= e(Setting::get($key)) ?>">
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
            <button type="submit" class="btn-add-cart">Save Settings</button>
          </form>
        </div>

      </div>
    </div>
  </div>
</body>
</html>
