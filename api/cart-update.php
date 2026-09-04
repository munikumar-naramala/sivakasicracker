<?php
require_once __DIR__ . '/../config/config.php';

$isAjax = ($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'XMLHttpRequest';
$referrer = $_SERVER['HTTP_REFERER'] ?? 'place-order.php';

function respond(bool $isAjax, ?string $redirectTo): void
{
    if ($isAjax) {
        header('Content-Type: application/json');
        $cart = Cart::resolve();
        echo json_encode([
            'success'    => true,
            'cart_count' => Cart::count(),
            'subtotal'   => $cart['subtotal'],
            'lines'      => $cart['lines'],
        ]);
        exit;
    }

    header('Location: ' . $redirectTo);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !csrfVerify($_POST['csrf_token'] ?? null)) {
    respond($isAjax, $referrer);
}

// Quick single-item removal (from a per-row "Remove" button).
if (isset($_POST['remove_product_id'])) {
    $productId = filter_var($_POST['remove_product_id'], FILTER_VALIDATE_INT);
    if ($productId !== false) {
        Cart::remove($productId);
    }
}

// Quantity update(s) — fired automatically by the cart page's quantity
// steppers (see assets/js/cart.js), not a manual submit. 0 removes the line.
$submittedQuantities = $_POST['quantity'] ?? [];
if (is_array($submittedQuantities)) {
    foreach ($submittedQuantities as $productId => $quantity) {
        $productId = filter_var($productId, FILTER_VALIDATE_INT);
        $quantity = filter_var($quantity, FILTER_VALIDATE_INT);
        if ($productId !== false && $quantity !== false) {
            Cart::setQuantity($productId, $quantity);
        }
    }
}

respond($isAjax, $referrer);
