<?php
/** Expects: $name, $email, $phone, $subject, $message */
?>
<!DOCTYPE html>
<html>
<body style="font-family: Arial, sans-serif; color: #333; max-width: 600px; margin: 0 auto;">
  <h2 style="color:#ea3810;">New contact form message</h2>
  <p>
    <strong>Name:</strong> <?= e($name) ?><br>
    <strong>Email:</strong> <?= e($email) ?><br>
    <?php if ($phone): ?><strong>Phone:</strong> <?= e($phone) ?><br><?php endif; ?>
    <?php if ($subject): ?><strong>Subject:</strong> <?= e($subject) ?><br><?php endif; ?>
  </p>
  <p><?= nl2br(e($message)) ?></p>
</body>
</html>
