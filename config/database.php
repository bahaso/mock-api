<?php
/**
 * Created by PhpStorm.
 * User: suhar
 * Date: 2019-03-25
 * Time: 19:33
 */

return [

    'default' => 'mongodb',

    'connections' => [
        'mongodb' => [
            'driver'   => 'mongodb',
            'host'     => env('DB_HOST', 'localhost'),
            'port'     => env("DB_PORT", 27017),
            'username' => env('DB_USERNAME', ''),
            'password' => env('DB_PASSWORD', ''),
            'database' => env('DB_DATABASE', 'forge'),
            'options'  => [
                'replicaSet' => env('DB_MONGO_REPLICA_SET_NAME', 'rs0'),
                'readPreference'=> env('DB_MONGO_READ_PREFERENCE', 'primaryPreferred')
            ]
        ],

    ],

];
