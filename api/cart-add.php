<?php
require_once __DIR__ . '/../config/config.php';

$isAjax = ($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'XMLHttpRequest';

function respond(bool $success, string $message, bool $isAjax, ?string $redirectTo = null): void
{
    if ($isAjax) {
        header('Content-Type: application/json');
        $cart = Cart::resolve();
        echo json_encode([
            'success'    => $success,
            'message'    => $message,
            'cart_count' => Cart::count(),
            'subtotal'   => $cart['subtotal'],
        ]);
        exit;
    }

    header('Location: ' . ($redirectTo ?: 'price-list.php') . ($success ? '?added=1' : '?added=0'));
    exit;
}

$referrer = $_SERVER['HTTP_REFERER'] ?? 'price-list.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(false, 'Invalid request method.', $isAjax, $referrer);
}

if (!csrfVerify($_POST['csrf_token'] ?? null)) {
    respond(false, 'Your session expired, please refresh the page and try again.', $isAjax, $referrer);
}

$productId = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT) ?: 1;

if (!$productId || $quantity < 1) {
    respond(false, 'Invalid product or quantity.', $isAjax, $referrer);
}

$product = Product::find($productId);
if ($product === null || $product['status'] === 'hidden' || $product['status'] === 'sold_out') {
    respond(false, 'This product is not currently available.', $isAjax, $referrer);
}

Cart::add($productId, $quantity);
respond(true, 'Added to cart.', $isAjax, $referrer);
