<?php

return [
    'auth' => [
        'user' => [
            /**
             * This will affect getting user whos created history.
             */
            'model' => 'App\Models\Auth\User',
        ]
    ],
    'baseableName' => 'historyName',

    // Spatie permission master role
    'master_role_name' => 'super admin',

    'formats' => [
//        'date' => 'F jS, Y',
        'time_12' => 'g:ia',
//        'time_24' => 'g:i',
//        'datetime_12' => 'F jS, Y g:ia',
//        'datetime_24' => 'F jS, Y g:i',
    ],

    'routes' => [
        'user' => [
            'show' => 'admin.auth.users.show',
        ],
    ],
];
