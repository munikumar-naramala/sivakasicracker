<?php
/**
 * TEMPORARY diagnostic page. Delete this file once you're done with it —
 * it's not something that should stay on a live site.
 *
 * Directly answers: is logs/ actually writable, is mail() callable, and
 * what does mail() itself return when we call it right now — instead of
 * guessing from application-level behavior.
 */
require_once __DIR__ . '/config/config.php';

header('Content-Type: text/plain');

echo "=== Mail Diagnostic ===\n\n";

echo "PHP version: " . PHP_VERSION . "\n";
echo "SAPI: " . php_sapi_name() . "\n\n";

echo "--- mail() function ---\n";
echo "function_exists('mail'): " . (function_exists('mail') ? 'YES' : 'NO (disabled on this host)') . "\n";
$disabled = ini_get('disable_functions');
echo "disable_functions contains 'mail': " . (str_contains($disabled, 'mail') ? 'YES — this is likely the problem' : 'no') . "\n";
echo "sendmail_path ini setting: " . (ini_get('sendmail_path') ?: '(empty/default)') . "\n\n";

echo "--- logs/ directory ---\n";
$logsDir = __DIR__ . '/logs';
echo "Path: $logsDir\n";
echo "exists: " . (is_dir($logsDir) ? 'YES' : 'NO') . "\n";
echo "is_writable() reports: " . (is_writable($logsDir) ? 'YES' : 'NO') . "\n";

$testFile = $logsDir . '/write-test-' . time() . '.txt';
$writeResult = @file_put_contents($testFile, 'test');
echo "Actual test write: " . ($writeResult !== false ? "SUCCESS ($writeResult bytes)" : 'FAILED — ' . (error_get_last()['message'] ?? 'unknown error')) . "\n";
if ($writeResult !== false) {
    @unlink($testFile);
    echo "(test file cleaned up)\n";
}
echo "\n";

echo "--- Actually calling mail() right now ---\n";
// Allowlisted so this can't be used as an open mail relay if a bot finds this
// URL in the short window it's live — add your own test address here if needed.
$allowedRecipients = [
    Setting::get('email'),
    'thesistrekai@gmail.com',
];
$testTo = $_GET['to'] ?? '';
if ($testTo === '' || !filter_var($testTo, FILTER_VALIDATE_EMAIL)) {
    echo "Add ?to=youremail@example.com to the URL to send a real test message and see mail()'s return value.\n";
    echo "(only pre-approved addresses in \$allowedRecipients will actually be sent to)\n";
} elseif (!in_array($testTo, $allowedRecipients, true)) {
    echo "Refused: $testTo is not in the allowlist in this file. Edit \$allowedRecipients if you need a different address.\n";
} else {
    $domain = preg_replace('/^www\./', '', explode(':', $_SERVER['HTTP_HOST'] ?? 'localhost')[0]);
    $headers = "MIME-Version: 1.0\r\nContent-type: text/plain; charset=UTF-8\r\n";
    $headers .= "From: Diagnostic <noreply@{$domain}>\r\n";

    $before = error_get_last();
    $result = @mail($testTo, 'Sivakasi Cracker - mail() diagnostic test', 'If you receive this, mail() is working and delivering. Timestamp: ' . date('c'), $headers);
    $after = error_get_last();

    echo "mail() returned: " . ($result ? 'TRUE (PHP believes it handed the message off successfully)' : 'FALSE (PHP itself reports failure)') . "\n";
    if ($after !== $before) {
        echo "PHP warning/error during the call: " . ($after['message'] ?? 'none captured') . "\n";
    }
    echo "Sent to: $testTo\n";
    echo "From used: noreply@{$domain}\n";
}

echo "\n=== End of diagnostic — please delete diagnose-mail.php after reading this ===\n";
