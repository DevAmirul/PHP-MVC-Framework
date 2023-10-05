<?php

return [
    'default' => env('DB_CONNECTION', 'mysql'), // default connection mysql
    'connections' => [
        'mysql'  => [
            'driver'      => 'mysql',
            'host'        => env('DB_HOST', '127.0.0.1'),
            'port'        => env('DB_PORT', '3306'),
            'database'    => env('DB_DATABASE', ''),
            'username'    => env('DB_USERNAME', 'root'),
            'password'    => env('DB_PASSWORD', ''),
        ]
    ],
];