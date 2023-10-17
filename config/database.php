<?php

return [
    /**
     * Default Database Connection Name.
     */
    'default'     => env('DB_CONNECTION', 'mysql'),

    /**
     * Define multiple database Configurations.
     */
    'connections' => [
        'mysql' => [
            'driver'   => 'mysql',
            'host'     => env('DB_HOST', '127.0.0.1'),
            'port'     => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'php_micro_framework'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'error'    => env('DB_ERROR', 'PDO::ERRMODE_EXCEPTION'),
        ],
    ],
];