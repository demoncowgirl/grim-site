<?php

$cleardb_url      = parse_url(getenv("CLEARDB_DATABASE_URL"));
$server   = $cleardb_url["host"];
$username = $cleardb_url["user"];
$password = $cleardb_url["pass"];
$database = substr($cleardb_url["path"],1);

$active_group = 'default';
$query_builder = TRUE;

// $database['default'] = array(
//     'dsn'    => '',
//     'hostname' => $cleardb_server,
//     'username' => $cleardb_username,
//     'password' => $cleardb_password,
//     'database' => $cleardb_db,
//     'dbdriver' => 'mysqli',
//     'dbprefix' => '',
//     'pconnect' => FALSE,
//     'db_debug' => (ENVIRONMENT !== 'production'),
//     'cache_on' => FALSE,
//     'cachedir' => '',
//     'char_set' => 'utf8',
//     'dbcollat' => 'utf8_general_ci',
//     'swap_pre' => '',
//     'encrypt' => FALSE,
//     'compress' => FALSE,
//     'stricton' => FALSE,
//     'failover' => array(),
//     'save_queries' => TRUE
// );


return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'heroku_mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

        'heroku_mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', $server),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', $database),
            'username' => env('DB_USERNAME', $username),
            'password' => env('DB_PASSWORD', $password),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        // 'mysql2' => [
        //     'driver'    => 'mysql',
        //     'host'      => env('DB_HOST', 'localhost:5432'),
        //     'database'  => env('DB_DATABASE', 'grim'),
        //     'username'  => env('DB_USERNAME', 'root'),
        //     'password'  => env('DB_PASSWORD', '#1Chupacabra64'),
        //     'charset'   => 'utf8',
        //     'collation' => 'utf8_unicode_ci',
        //     'port'      => env('DB_PORT', '80'),
        //     'prefix'    => '',
        //     'strict'    => false,
        // ],

        //   'pgsql' => [
        //       'driver' => 'pgsql',
        //       'host' => env('DB_HOST', '127.0.0.1'),
        //       'port' => env('DB_PORT', '5432'),
        //       'database' => env('DB_DATABASE', 'forge'),
        //       'username' => env('DB_USERNAME', 'forge'),
        //       'password' => env('DB_PASSWORD', ''),
        //       'charset' => 'utf8',
        //       'prefix' => '',
        //       'schema' => 'public',
        //       'sslmode' => 'prefer',
        //   ],
        //
        // 'pgsql' => [
        //     'driver' => 'pgsql',
        //     'host' => $DATABASE_URL['host'],
        //     'port' => $DATABASE_URL['port'],
        //     'database' => ltrim($DATABASE_URL['path'], '/'),
        //     'username' => $DATABASE_URL['user'],
        //     'password' => $DATABASE_URL['pass'],
        //     'charset' => 'utf8',
        //     'prefix' => '',
        //     'schema' => 'public',
        //     'sslmode' => 'prefer',
        // ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
        ],

    ],


    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => env('REDIS_DB', 0),
        ],

        'cache' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => env('REDIS_CACHE_DB', 1),
        ],

    ],

];
