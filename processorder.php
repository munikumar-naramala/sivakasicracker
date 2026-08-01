<?php
require_once __DIR__ . '/config/config.php';

function backToOrderForm(string $error, array $oldInput = [])
{
    $_SESSION['place_order_old_input'] = $oldInput;
    header('Location: place-order.php?error=' . urlencode($error));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['place_order'])) {
    header('Location: index.php');
    exit;
}

if (!csrfVerify($_POST['csrf_token'] ?? null)) {
    backToOrderForm('Your session expired, please try again.');
}

if (RateLimiter::tooManyAttempts('place_order', 5, 300)) {
    backToOrderForm('Too many orders submitted recently. Please wait a few minutes and try again.');
}

// Apply any quantity edits made on the cart review page before pricing the order.
// Quantities are the only client-supplied cart value ever trusted — prices/names
// always come from Product::findMany() inside Cart::resolve()/Order::createFromCart().
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

$name = trim((string) ($_POST['name'] ?? ''));
$mobile = trim((string) ($_POST['mobile'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$address = trim((string) ($_POST['address'] ?? ''));

$oldInput = ['name' => $name, 'mobile' => $mobile, 'email' => $email, 'address' => $address];

if ($name === '' || $mobile === '' || $address === '') {
    backToOrderForm('Please fill in all required fields.', $oldInput);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    backToOrderForm('Please enter a valid email address.', $oldInput);
}

if (!preg_match('/^[0-9+\-\s()]{7,20}$/', $mobile)) {
    backToOrderForm('Please enter a valid mobile number.', $oldInput);
}

try {
    $order = Order::createFromCart([
        'name'    => $name,
        'email'   => $email,
        'mobile'  => $mobile,
        'address' => $address,
    ]);
} catch (RuntimeException $e) {
    backToOrderForm($e->getMessage(), $oldInput);
}

// Re-fetch with items in the same shape the email templates expect.
$fullOrder = Order::find($order['id']);
$fullOrder['customer_name'] = $name;
$fullOrder['customer_email'] = $email;
$fullOrder['customer_mobile'] = $mobile;
$fullOrder['customer_address'] = $address;

// Only the session that just placed this order may view its confirmation page —
// order numbers are sequential/guessable and must not expose another customer's
// name, email, or address to anyone who edits the URL.
$_SESSION['confirmed_order_numbers'][] = $fullOrder['order_number'];

header('Location: order-placed.php?order=' . urlencode($fullOrder['order_number']));

// The order is safely in the database at this point — everything from here
// down is "send the confirmation emails," which must never make the customer
// wait. Flush the redirect to the browser now and keep running afterward.
session_write_close();
finishResponseAndContinue();

$emailData = [
    'order'        => $fullOrder,
    'businessName' => Setting::get('business_name'),
    'bank1'        => Setting::get('bank1_details'),
    'bank2'        => Setting::get('bank2_details'),
    'whatsapp'     => Setting::get('phone'),
];

Mailer::send(
    $email,
    'Order Confirmation - ' . $fullOrder['order_number'],
    'order-customer',
    $emailData
);

$ownerEmail = Setting::get('email');
if ($ownerEmail !== '') {
    Mailer::send(
        $ownerEmail,
        'New Order - ' . $fullOrder['order_number'],
        'order-admin',
        $emailData
    );
}

exit;
