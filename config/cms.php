<?php

return [
    'image' => [
        'directory' => 'storage/event_image',
        'thumbnail' => [
            'width' => 250,
            'height' => 170
        ]
    ],
    's3-image' => [
        'directory' => 'https://s3.us-east-2.amazonaws.com/ipumpevents/images/',
        'thumbnail' => [
            'width' => 250,
            'height' => 170
        ],
    ],
    'default_category_id' => 1, 
    'default_user_id' => 1,
    'default_role_id' => 1,
];