<?php

/**
 * Lightweight per-session submission throttle for public forms (contact,
 * place-order). Session-based rather than a DB table — sufficient for a
 * single storefront's traffic volume and avoids a table just for counters.
 */
class RateLimiter
{
    public static function tooManyAttempts(string $key, int $maxAttempts, int $windowSeconds): bool
    {
        $now = time();
        $bucket = $_SESSION['rate_limit'][$key] ?? [];
        $bucket = array_filter($bucket, static fn($ts) => $ts > $now - $windowSeconds);

        if (count($bucket) >= $maxAttempts) {
            $_SESSION['rate_limit'][$key] = $bucket;
            return true;
        }

        $bucket[] = $now;
        $_SESSION['rate_limit'][$key] = $bucket;
        return false;
    }
}
