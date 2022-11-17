<?php

return [

    'status' => [
        '0' => 'inactive',
        '1' => 'active',
    ],
    'type' => [
        '0' => 'Physical',
        '1' => 'Digital',
        '2' => 'License'
    ],
    'country' => [
        'uk' => 'United Kingdom (UK)',
        'us' => 'United States (USA)',
        'fr' => 'France',
        'aus' => 'Australia'
    ],

    'order_status' => [
        '0' => 'Pending',
        '1' => 'On hold',
        '2' => 'Completed',
        '3' => 'Packed',
        '4' => 'Shipped',
        '5' => 'Delivered',
        '6' => 'Declined',
    ],

    'role' => [
        '0' => 'Super Admin',
        '1' => 'Admin',
        '2' => 'user',
        '3' => 'not define'
    ],
    'condition' => [
        '0' => 'new',
        '1' => 'old like new',
        '2' => 'old good',
        '3' => 'old ok',
    ],
    'vendor_status' => [
        '0' => 'Unverified',
        '1' => 'verified',
    ],

    'plan_status' => [
        '0' => 'active',
        '1' => 'expired',
    ]
]


?>