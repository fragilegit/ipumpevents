<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '237554653678936',         // facebook Client ID
        'client_secret' => 'e75a4274dad7e9eb12f3e63f483cea0a', // facebook Client Secret
        'redirect' => 'https://ipumpevents.herokuapp.com/login/facebook/callback',
    ],

    // 'facebook' => [
    //     'client_id' => env("FB_APP", '237554653678936'),         // Your GitHub Client ID
    //     'client_secret' => env('e75a4274dad7e9eb12f3e63f483cea0a'), // Your GitHub Client Secret
    //     'redirect' => 'http://evwebapp.test:82/login/facebook/callback',
    // ],

];
