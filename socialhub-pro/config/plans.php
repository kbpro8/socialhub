<?php

return [
    'free' => [
        'name' => 'Free',
        'price_id' => null,
        'features' => [
            '1 Social Account',
            '10 Scheduled Posts per month',
            'Basic Analytics',
        ],
    ],
    'premium' => [
        'name' => 'Premium',
        'price_id' => env('STRIPE_PREMIUM_PRICE_ID'),
        'features' => [
            '10 Social Accounts',
            'Unlimited Scheduled Posts',
            'Advanced Analytics',
            'AI Content Generation',
        ],
    ],
    'enterprise' => [
        'name' => 'Enterprise',
        'price_id' => env('STRIPE_ENTERPRISE_PRICE_ID'),
        'features' => [
            'Unlimited Social Accounts',
            'Unlimited Scheduled Posts',
            'Advanced Analytics',
            'AI Content Generation',
            'Team Collaboration',
            'White-Label Solution',
        ],
    ],
];
