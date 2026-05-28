<?php
    session_start();
    $config = require __DIR__ . '/config.php';
    $merchant_id = $config['merchant_id'];
    $merchant_secret = $config['merchant_secret'];
    $dbHost = $config['db']['host'];
    $dbUser = $config['db']['user'];
    $dbPass = $config['db']['pass'];
    $dbName = $config['db']['name'];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $amount = $_POST['amount'];

    // 1. Format the amount to exactly 2 decimal places first
    $formatted_amount = number_format($amount, 2, '.', '');

    $order_id = uniqid();

    $currency = "LKR";

    // Store order data in session
    $_SESSION['orders'][$order_id] = [
        'name'     => $name,
        'email'    => $email,
        'phone'    => $phone,
        'amount'   => $formatted_amount,
        'currency' => $currency,
    ];

    $hash = strtoupper(md5(
        $merchant_id . $order_id . $formatted_amount . $currency .
        strtoupper(md5($merchant_secret))
    ));
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Redirecting...</title>
    </head>
    <body>
        <form method="post" action="https://sandbox.payhere.lk/pay/checkout" id="payhere-form">
            <input type="hidden" name="merchant_id" value="<?php echo $merchant_id; ?>">
            <input type="hidden" name="return_url" value="YOUR_PAYMENT_SUCCESS_PAGE_URL">
            <input type="hidden" name="cancel_url" value="YOUR_PAYMENT_CANCEL_PAGE_URL">
            <input type="hidden" name="notify_url" value="YOUR_PAYMENT_NOTIFY_PAGE_URL">
            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
            <input type="hidden" name="items" value="Payment Gateway">
            <input type="hidden" name="currency" value="LKR">
            <input type="hidden" name="amount" value="<?php echo $formatted_amount; ?>">
            <input type="hidden" name="first_name" value="<?php echo $name; ?>">
            <input type="hidden" name="last_name" value="Customer">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <input type="hidden" name="phone" value="<?php echo $phone; ?>">
            <input type="hidden" name="address" value="Colombo">
            <input type="hidden" name="city" value="Colombo">
            <input type="hidden" name="country" value="Sri Lanka">
            <input type="hidden" name="hash" value="<?php echo $hash; ?>">
        </form>
        <script>
            document.getElementById("payhere-form").submit();
        </script>
    </body>
</html>