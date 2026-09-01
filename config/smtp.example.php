<?php
// Copy this file to config/smtp.php and fill in your Brevo SMTP credentials
// (Settings → SMTP & API → SMTP tab in Brevo). config/smtp.php is gitignored
// and must never be committed. If this file doesn't exist on the server,
// Mailer falls back to PHP's built-in mail() automatically.

return [
    'host'     => 'smtp-relay.brevo.com',
    'port'     => 587,
    'username' => '',
    'password' => '',
    // The address Brevo actually sends as. Doesn't need to be a real mailbox,
    // but using your own domain here (rather than a personal Gmail, etc.)
    // keeps sender-alignment clean. Recipients see settings.email in Reply-To.
    'from_email' => 'noreply@sivakasicracker.com',
];
