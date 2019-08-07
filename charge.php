<?php 
    require_once('vendor/autoload.php');

    \Stripe\Stripe::setApiKey('sk_test_fQbBAQKMldB2Oi6ds8WgqgDj');

    //sanitize $_POST array
    $post = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    $first_name = $post['first_name'];
    $last_name = $post['last_name'];
    $email = $post['email'];
    $token = $post['stripeToken'];

    $customer = \Stripe\Customer::create([
        'email' => $email,
        'source' => $token
    ]);

    $charge = \Stripe\Charge::create([
        'amount' => 5000,
        'currency' => 'usd',
        'description' => 'Intro to course',
        'customer' => $customer->id
    ]);

    print_r($charge);

