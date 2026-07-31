<?php
require_once __DIR__ . '/../config/config.php';
AdminAuth::requireLogin();

$activeAdminNav = 'messages';
$pageTitle = 'Contact Messages';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (csrfVerify($_POST['csrf_token'] ?? null)) {
        $id = (int) $_POST['id'];
        if (($_POST['action'] ?? '') === 'mark_read') {
            ContactMessage::markRead($id);
        } elseif (($_POST['action'] ?? '') === 'delete') {
            ContactMessage::delete($id);
            AuditLog::record('contact_message.delete', 'contact_message', $id);
        }
    }
    header('Location: messages.php');
    exit;
}

$messages = ContactMessage::allForAdmin();
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

        <?php foreach ($messages as $message): ?>
          <div class="admin-card" style="<?= $message['is_read'] ? 'opacity:.7;' : 'border-left:3px solid var(--accent);' ?>">
            <div class="d-flex justify-content-between">
              <div>
                <strong><?= e($message['name']) ?></strong>
                <span class="text-muted">&lt;<?= e($message['email']) ?>&gt;</span>
                <?php if ($message['phone']): ?><span class="text-muted"> · <?= e($message['phone']) ?></span><?php endif; ?>
              </div>
              <span class="text-muted" style="font-size:12px;"><?= e(date('d M Y, H:i', strtotime($message['created_at']))) ?></span>
            </div>
            <?php if ($message['subject']): ?><p class="mb-1"><strong><?= e($message['subject']) ?></strong></p><?php endif; ?>
            <p><?= nl2br(e($message['message'])) ?></p>
            <form method="post" style="display:inline;">
              <?= csrfField() ?>
              <input type="hidden" name="id" value="<?= (int) $message['id'] ?>">
              <?php if (!$message['is_read']): ?>
                <button type="submit" name="action" value="mark_read" class="btn btn-outline-secondary btn-sm">Mark Read</button>
              <?php endif; ?>
              <button type="submit" name="action" value="delete" class="btn btn-outline-danger btn-sm" onclick="return confirm('Delete this message?');">Delete</button>
            </form>
          </div>
        <?php endforeach; ?>

        <?php if (empty($messages)): ?>
          <div class="admin-card text-center text-muted">No messages yet.</div>
        <?php endif; ?>

      </div>
    </div>
  </div>
</body>
</html>
