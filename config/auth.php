<?php

return [

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    'guards' => [
        // Admin
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        // Técnico
        'tecnico' => [
            'driver' => 'session',
            'provider' => 'tecnicos',
        ],

        // Cliente
        'cliente' => [
            'driver' => 'session',
            'provider' => 'clientes',
        ],

        // Web por defecto
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    'providers' => [
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\AdministradoresModelo::class,
        ],

        'tecnicos' => [
            'driver' => 'eloquent',
            'model' => App\Models\TecnicosModelo::class,
        ],

        'clientes' => [
            'driver' => 'eloquent',
            'model' => App\Models\clientesModelo::class,
        ],

        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    ],

    'passwords' => [
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'tecnicos' => [
            'provider' => 'tecnicos',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'clientes' => [
            'provider' => 'clientes',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
