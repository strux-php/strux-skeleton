<?php

declare(strict_types=1);

namespace App\Config;

use PDO;
use Strux\Component\Config\ConfigInterface;

class Database implements ConfigInterface
{
    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
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
            'default' => env('DB_CONNECTION', 'sqlite'),

            /*
            |--------------------------------------------------------------------------
            | Database Connections
            |--------------------------------------------------------------------------
            |
            | Here are each of the database connections setup for your application.
            | Of course, examples of configuring each database platform that is
            | supported by PDO are provided below to make development simple.
            |
            */
            'connections' => [
                'sqlite' => [
                    'driver' => 'sqlite',
                    'path' => env('DB_PATH', ROOT_PATH . '/var/database/app.db'),
                    'prefix' => '',
                    'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
                    'options' => [
                        // PDO::ATTR_TIMEOUT => 5
                    ],
                ],

                'mysql' => [
                    'driver' => 'mysql',
                    'host' => env('DB_HOST', '127.0.0.1'),
                    'port' => env('DB_PORT', '3306'),
                    'database' => env('DB_DATABASE'),
                    'username' => env('DB_USERNAME'),
                    'password' => env('DB_PASSWORD'),
                    'unix_socket' => env('DB_SOCKET', ''),
                    'charset' => 'utf8mb4',
                    'collation' => 'utf8mb4_unicode_ci',
                    'prefix' => '',
                    'strict' => true,
                    'engine' => null,
                    'options' => [
                        // PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA')
                    ]
                ],

                'pgsql' => [
                    'driver' => 'pgsql',
                    'host' => env('DB_HOST', '127.0.0.1'),
                    'port' => env('DB_PORT', '5432'),
                    'database' => env('DB_DATABASE'),
                    'username' => env('DB_USERNAME'),
                    'password' => env('DB_PASSWORD'),
                    'charset' => 'utf8',
                    'prefix' => '',
                    'schema' => 'public',
                ],

                'sqlsrv' => [
                    'driver' => 'sqlsrv',
                    'host' => env('DB_HOST', 'localhost'),
                    'port' => env('DB_PORT', '1433'),
                    'database' => env('DB_DATABASE'),
                    'username' => env('DB_USERNAME'),
                    'password' => env('DB_PASSWORD'),
                    'charset' => 'utf8',
                    'prefix' => '',
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | Global PDO Fetch Style & Options
            |--------------------------------------------------------------------------
            */
            'fetch' => PDO::FETCH_ASSOC, // Changed from FETCH_OBJ to match your DI setup
            'global_options' => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
                // PDO::ATTR_PERSISTENT => false
            ]
        ];
    }
}
