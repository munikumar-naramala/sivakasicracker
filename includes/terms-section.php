<?php
/** Terms & Conditions section — only rendered on index.php; other pages link to index.php#team. */
$terms = array_filter(array_map('trim', explode("\n", Setting::get('terms_conditions'))));
?>
<section id="team" class="team section-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Terms & Conditions</h2>
      <h3>The following are our <span>Terms & Conditions</span> subject to Sivakasi Jurisdiction</h3>
      <ul style="text-align: left;">
        <?php foreach ($terms as $term): ?>
          <li><?= e($term) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</section>
