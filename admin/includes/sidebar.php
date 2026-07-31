<?php
/** Expects $activeAdminNav to be set (e.g. 'dashboard', 'products', 'orders', ...). */
$activeAdminNav = $activeAdminNav ?? '';
$currentAdmin = AdminAuth::currentUser();

$navItems = [
    'dashboard'  => ['index.php', 'bi-speedometer2', 'Dashboard'],
    'products'   => ['products.php', 'bi-box-seam', 'Products'],
    'categories' => ['categories.php', 'bi-tags', 'Categories'],
    'orders'     => ['orders.php', 'bi-receipt', 'Orders'],
    'banners'    => ['banners.php', 'bi-images', 'Banners'],
    'messages'   => ['messages.php', 'bi-envelope', 'Contact Messages'],
    'settings'   => ['settings.php', 'bi-gear', 'Settings'],
    'reports'    => ['reports.php', 'bi-bar-chart', 'Reports'],
];
if (($currentAdmin['role'] ?? '') === 'admin') {
    $navItems['users'] = ['users.php', 'bi-people', 'Users'];
}
?>
<aside class="admin-sidebar">
  <div class="brand">Sivakasi Cracker<br><small style="font-weight:400; opacity:.7;">Admin Panel</small></div>
  <nav>
    <?php foreach ($navItems as $key => [$href, $icon, $label]): ?>
      <a href="<?= e($href) ?>" class="<?= $activeAdminNav === $key ? 'active' : '' ?>">
        <i class="bi <?= e($icon) ?>"></i> <?= e($label) ?>
      </a>
    <?php endforeach; ?>
    <a href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
  </nav>
</aside>
