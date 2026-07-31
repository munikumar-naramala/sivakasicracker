<?php $currentAdmin = $currentAdmin ?? AdminAuth::currentUser(); ?>
<div class="admin-topbar">
  <h5 class="mb-0"><?= e($pageTitle ?? 'Admin') ?></h5>
  <div>
    <span class="text-muted"><?= e($currentAdmin['full_name'] ?? '') ?> (<?= e($currentAdmin['role'] ?? '') ?>)</span>
    · <a href="../index.php" target="_blank">View Site</a>
  </div>
</div>
