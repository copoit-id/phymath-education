<?php

return [
    // Mode: 'xendit' for automatic gateway, 'manual' for upload transfer
    'mode' => env('PAYMENT_MODE', 'xendit'),

    'manual' => [
        'bank_name' => env('PAYMENT_MANUAL_BANK_NAME', 'BCA'),
        'account_name' => env('PAYMENT_MANUAL_ACCOUNT_NAME', 'PT PhyMath Education'),
        'account_number' => env('PAYMENT_MANUAL_ACCOUNT_NUMBER', '1234567890'),
        'instructions' => env('PAYMENT_MANUAL_INSTRUCTIONS', 'Transfer sesuai nominal lalu upload bukti pembayaran. Admin akan memverifikasi dalam 1x24 jam.'),
    ],
];

