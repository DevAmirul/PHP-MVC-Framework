<?php

return [

    /**
     * Mailer Configurations.
     */
    'smtp'    => [
        'host'         => env('MAIL_HOST', 'sandbox.smtp.mailtrap.io'),
        'port'         => env('MAIL_PORT', 587),
        'username'     => env('MAIL_USERNAME', ''),
        'password'     => env('MAIL_PASSWORD', ''),
    ],

    /**
     * Global "From" Address.
     */
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'PhpMicroFramework'),
    ],
];