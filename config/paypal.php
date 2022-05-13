<?php
return [
    'client_id'=>env('PAYPAL_CLIENT_ID'),
    'secret' => env('PAYPAL_SECRET'),


    'settings'=>[
        'mode'=>env('PAYPAL_MODE'),
        'http.ConnectionTimeOut' => 30,
        'log.Enabled' => false,
        'log.FilleName'=> storage_path('/logs/paypal.log'),
        'log.LogLevel' => 'FINE', // 'log.LogLevel' => 'ERROR' (PARA SANDBOX)
        'validation.level'=>'log'
    ]
];