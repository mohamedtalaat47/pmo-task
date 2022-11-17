<?php

require 'config.php';
require 'vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey(STRIPE_API_KEY);

header('Content-Type: application/json');

// $YOUR_DOMAIN = 'http://localhost:4242/public';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => 'price_1M5AxRELUm7XnnkVh3M9wy5a',
    'quantity' => $_POST['duration'],
  ]],
  'mode' => 'payment',
  'success_url' => 'http://localhost/pmo-task/payment_success.php',
  'cancel_url' => 'http://localhost/pmo-task/payment_fail.php',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);