<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    */
    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    */
    'guards' => [
        // Guard para administradores
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        // Guard para técnicos
        'tecnico' => [
            'driver' => 'session',
            'provider' => 'tecnicos',
        ],

        // Guard web por defecto (opcional)
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    */
    'providers' => [
        // Proveedor de administradores
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\AdministradoresModelo::class,
        ],

        // Proveedor de técnicos
        'tecnicos' => [
            'driver' => 'eloquent',
            'model' => App\Models\TecnicosModelo::class,
        ],

        // Proveedor de usuarios por defecto (opcional)
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    */
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
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    */
    'password_timeout' => 10800,

];
