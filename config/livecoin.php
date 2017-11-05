<?php

return [
    'url'    => 'https://api.livecoin.net/',
    'auth' => [
        'key'    => env('LIVECOIN_KEY', ''),
        'secret' => env('LIVECOIN_SECRET', ''),
    ]
];