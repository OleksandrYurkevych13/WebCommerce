<?php
require __DIR__ . '/../vendor/autoload.php';

$stripe_secret_key = "sk_test_51PD6aq06HMkraadb4ntx5VK5dKnno7lmyuLz1XX5O6NtDQKFXUX8vj5zhBbqEvvLK8AhcKXoiHjkeN5y1dSM3hqT006DULOzOL";

\Stripe\Stripe::setApiKey($stripe_secret_key);


$item_titles = $_POST['item-title']; 
$item_prices = array_map('intval', $_POST['item-price']);
$item_quantities = $_POST['item-quantity']; 
$product_imgs = $_POST['productImg']; 


$line_items = [];
for ($i = 0; $i < count($item_titles); $i++) {
    $line_items[] = [
        "quantity" => $item_quantities[$i],
        "price_data" => [
            "currency" => "usd",
            "unit_amount" => $item_prices[$i] * 100, 
            "product_data" => [
                "name" => $item_titles[$i],
                "images" => $product_imgs
            ]
        ]
    ];
}


$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost:3000/Shop/Html/success.html",
    "cancel_url" => "http://localhost:3000/Shop/Html/cancel.html",
    "payment_method_types" => ["card"],
    "line_items" => $line_items 
]);


http_response_code(303);
header("Location: " . $checkout_session->url);