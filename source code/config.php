<?php
    return [
        'merchant_id' => 'YOUR_MERCHANT_ID',
        'merchant_secret' => 'YOUR_MERCHANT_SECRET',

        'db' => [
            'host' => 'YOUR_DB_HOST',
            'user' => 'YOUR_DB_USER',
            'pass' => 'YOUR_DB_PASSWORD',
            'name' => 'payment_gateway',
        ],

        'smtp' => [
            'host' => 'YOUR_EMAIL_SMTP_HOST',
            'username' => 'YOUR_EMAIL_ADDRESS',
            'password' => 'YOUR_EMAIL_PASSWORD_OR_APP_PASSWORD',
            'port' => 465,
            'from_email' => 'YOUR_EMAIL_ADDRESS',
            'from_name' => 'Your App Name',
        ],
    ];
?>