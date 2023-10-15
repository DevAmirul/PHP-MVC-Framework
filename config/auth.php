<?php

return [

    'defaults' => 'web',

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