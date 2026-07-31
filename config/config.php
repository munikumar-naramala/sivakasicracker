<?php
/**
 * Application bootstrap. Every public and admin page requires this file first.
 */

// Errors are logged, never displayed to visitors — closes the Phase 1 finding
// that processorder.php used to leak PHP notices into page output.
error_reporting(E_ALL);
ini_set('display_errors', '0');
ini_set('log_errors', '1');
ini_set('error_log', __DIR__ . '/../logs/php-error.log');

define('BASE_PATH', dirname(__DIR__));
define('SITE_URL', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https://' : 'http://')
    . ($_SERVER['HTTP_HOST'] ?? 'localhost'));

// Uncaught exceptions get logged in full, but visitors only ever see a
// generic message — never a stack trace or file path.
set_exception_handler(function (Throwable $e) {
    error_log('Uncaught: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine());
    http_response_code(500);
    echo '<!DOCTYPE html><html><head><title>Something went wrong</title></head>'
        . '<body style="font-family:sans-serif; text-align:center; padding:60px;">'
        . '<h2>Something went wrong</h2><p>Please try again in a moment. If this keeps happening, contact us.</p>'
        . '</body></html>';
});

spl_autoload_register(function ($class) {
    $path = BASE_PATH . '/classes/' . $class . '.php';
    if (is_file($path)) {
        require_once $path;
    }
});

if (session_status() === PHP_SESSION_NONE) {
    $isHttps = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
    session_set_cookie_params([
        'lifetime' => 0,
        'path'     => '/',
        'httponly' => true,
        'secure'   => $isHttps,
        'samesite' => 'Lax',
    ]);
    ini_set('session.use_strict_mode', '1');
    session_start();
}

/** Escape a value for safe HTML output. Use this everywhere user/DB data is echoed. */
function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

/** Format a rupee amount consistently across the site. */
function formatMoney(float $amount): string
{
    return '₹' . number_format($amount, 2);
}

/** Escape a multi-line settings value and convert newlines to <br> for display. */
function nl(?string $value): string
{
    return nl2br(e($value));
}

/** Returns the current session's CSRF token, generating one if needed. */
function csrfToken(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/** Hidden <input> for a form. Echo this inside every state-changing <form>. */
function csrfField(): string
{
    return '<input type="hidden" name="csrf_token" value="' . e(csrfToken()) . '">';
}

/** Verifies a submitted CSRF token; call before acting on any POST request. */
function csrfVerify(?string $submitted): bool
{
    return is_string($submitted) && !empty($_SESSION['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $submitted);
}

/** Queues a one-time flash message (survives exactly one redirect). */
function flash(string $type, string $message): void
{
    $_SESSION['flash'][] = ['type' => $type, 'message' => $message];
}

/** Retrieves and clears all queued flash messages. */
function takeFlashes(): array
{
    $flashes = $_SESSION['flash'] ?? [];
    unset($_SESSION['flash']);
    return $flashes;
}

/** URL-safe slug from a name, e.g. for products/categories. */
function slugify(string $text): string
{
    $slug = strtolower(trim($text));
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
    return trim($slug, '-');
}
