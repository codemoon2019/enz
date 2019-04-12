<?php

return [
    'management' => [
        [
            'group_name' => 'site',
            'name' => 'Domain Information',
            'description' => "This is the general settings for the site.",
        ],
        [
            'group_name' => 'social',
            'name' => 'Social Information',
            'description' => "This is where the social links referring to the website can be set.",
        ],
        [
            'group_name' => 'contact',
            'name' => 'Contact Inquiry',
            'description' => 'This is where you can set the email address that will send and receive emails from the inquiry form.',
        ],
    ],

    'formats' => [
        'date' => 'F jS, Y',
        'time_12' => 'g:ia',
        'time_24' => 'g:i',
        'datetime_12' => 'F jS, Y g:ia',
        'datetime_24' => 'F jS, Y g:i',
    ],
];