<?php foreach (takeFlashes() as $flash): ?>
  <div class="form-feedback form-feedback--<?= $flash['type'] === 'error' ? 'error' : 'success' ?>">
    <?= e($flash['message']) ?>
  </div>
<?php endforeach; ?>
