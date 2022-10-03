<?php

return [

    'status' => [
        '0' => 'unverified',
        '1' => 'verified',
        '2' => 'inactive',
        '3' => 'active',
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
        '0' => 'pending',
        '1' => 'processing',
        '2' => 'completed',
        '3' => 'packed',
        '4' => 'shipped',
        '5' => 'delivered',
        '6' => 'declined',
    ],

    'role' => [
        '0' => 'Super Admin',
        '1' => 'Admin',
        '2' => 'user',
        '3' => 'not define'
    ],
]


?>