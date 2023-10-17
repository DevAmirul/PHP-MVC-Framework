<?php

return [

    /**
     * Set Default authentication guards.
     */
    'defaults' => 'web',

    /**
     * Define multiple guards.
     */
    'guards'   => [
        'web'    => [
            'provider' => 'users',
            'model' => App\Models\Users::class,
        ],

        'editor' => [
            'provider' => 'editors',
            'model' => App\Models\Editors::class,
        ],
    ],
];