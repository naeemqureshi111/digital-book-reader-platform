<?php

return [

    'defaults' => [
        'guard' => 'web',         // default guard for users
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [               // User guard
            'driver' => 'session',
            'provider' => 'users',
        ],

        'admin' => [             // Admin guard
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

    'providers' => [
        'users' => [             // User provider (Eloquent)
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'admins' => [            // Admin provider (Eloquent)
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
    ],

    // config/auth.php

'passwords' => [
    'users' => [
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
    ],
    'admins' => [
        'provider' => 'admins',
        'table' => 'password_resets',
        'expire' => 60,
    ],
],


    'password_timeout' => 10800,

];
