<?php
/**
 * TEMPORARY diagnostic. Delete after use.
 * Checks whether fastcgi_finish_request()/litespeed_finish_request() are
 * actually available and behave as expected on this host.
 */
require_once __DIR__ . '/config/config.php';

header('Content-Type: text/plain');

echo "SAPI: " . php_sapi_name() . "\n";
echo "function_exists('fastcgi_finish_request'): " . (function_exists('fastcgi_finish_request') ? 'YES' : 'NO') . "\n";
echo "function_exists('litespeed_finish_request'): " . (function_exists('litespeed_finish_request') ? 'YES' : 'NO') . "\n";

$start = microtime(true);

echo "Response sent at: " . round((microtime(true) - $start) * 1000, 1) . "ms\n";
echo "About to call finishResponseAndContinue()...\n";

finishResponseAndContinue();

$afterFinish = round((microtime(true) - $start) * 1000, 1);

// If finish actually detached us from the client, this sleep should NOT delay
// what the browser already received above.
sleep(3);

file_put_contents(__DIR__ . '/logs/finish-test.log', "afterFinish={$afterFinish}ms, slept 3s more, total=" . round((microtime(true) - $start) * 1000, 1) . "ms\n");
