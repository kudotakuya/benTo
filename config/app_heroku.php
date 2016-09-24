<?php
$db = parse_url(env('CLEARDB_DATABASE_URL'));
return [
	'debug' 	=> filter_var(env('DEBUG', false), FILTER_VALIDATE_BOOLEAN),
	'Security' 	=> [ 'salt' => env('SALT') ],
	'Cache' 	=> [
        'default' => [
             'engine' => 'Memcached',
             'prefix' => 'mc_',
             'duration' => '+7 days',
             'servers' => explode(',', getenv('MEMCACHIER_SERVERS')),
             'compress' => false,
             'persistent' => 'memcachier',
             'login' => getenv('MEMCACHIER_USERNAME'),
             'password' => getenv('MEMCACHIER_PASSWORD'),
             'serialize' => 'php'
        ],

        'session' => [
            'engine' => 'Memcached',
             'prefix' => 'myapp_cake_session_',
             'duration' => '+7 days',
             'servers' => explode(',', getenv('MEMCACHIER_SERVERS')),
             'compress' => false,
             'persistent' => 'memcachier',
             'login' => getenv('MEMCACHIER_USERNAME'),
             'password' => getenv('MEMCACHIER_PASSWORD'),
             'serialize' => 'php'
        ],

        '_cake_core_' => [
            'engine' => 'Memcached',
             'prefix' => 'myapp_cake_core_',
             'duration' => '+7 days',
             'servers' => explode(',', getenv('MEMCACHIER_SERVERS')),
             'compress' => false,
             'persistent' => 'memcachier',
             'login' => getenv('MEMCACHIER_USERNAME'),
             'password' => getenv('MEMCACHIER_PASSWORD'),
             'serialize' => 'php'
        ],

        '_cake_model_' => [
        'engine' => 'Memcached',
             'prefix' => 'myapp_cake_model_',
             'duration' => '+7 days',
             'servers' => explode(',', getenv('MEMCACHIER_SERVERS')),
             'compress' => false,
             'persistent' => 'memcachier',
             'login' => getenv('MEMCACHIER_USERNAME'),
             'password' => getenv('MEMCACHIER_PASSWORD'),
             'serialize' => 'php'
        ],
    ],
    'Session' 	=> [
        'defaults' => 'cache',
        'handler' => [
            'config' => 'session'
        ]
    ],
    'Log' 	=> [
        'debug' => [
            'className' => 'Cake\Log\Engine\ConsoleLog',
            'stream' => 'php://stdout',
            'levels' => ['notice', 'info', 'debug'],
        ],
        'error' => [
            'className' => 'Cake\Log\Engine\ConsoleLog',
            'stream' => 'php://stderr',
            'levels' => ['warning', 'error', 'critical', 'alert', 'emergency'],
        ],
    ],
    'Datasources' => [
        'default' => [
            'className' => 'Cake\Database\Connection',
            'driver' => 'Cake\Database\Driver\Mysql',
            'persistent' => false,
            'host' => $db['host'],
            'username' => $db['user'],
            'password' => $db['pass'],
            'database' => substr($db['path'], 1),
            'encoding' => 'utf8',
            'timezone' => 'UTC',
            'cacheMetadata' => true,
            'quoteIdentifiers' => false,
        ],
    ],


];
