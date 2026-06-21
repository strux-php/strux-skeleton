<?php

declare(strict_types=1);

use Strux\Component\Config\ConfigInterface;

return new class implements ConfigInterface {
    public function toArray(): array
    {
        return [
            'name' => 'Strux App',

            'meta' => [
                'title' => env('META_TITLE', 'Student Management System - A Simple PHP Framework'),
                'description' => env('META_DESCRIPTION', 'A lightweight PHP framework for building web applications.'),
            ],
            'env' => env('APP_ENV', 'development'), // or production, testing
            'debug' => (bool) env('APP_DEBUG', true),
            'url' => env('APP_URL', 'http://127.0.0.1:8000'),
            'version' => '1.3.0',
            'timezone' => 'UTC',
            'sessions' => [
                'driver' => 'file',
                'lifetime' => 120,
                'expire_on_close' => false,
                'path' => '/tmp',
                'name' => 'session_id',
                'domain' => null,
                'secure' => false,
                'http_only' => true,
            ],
            'csrf' => [
                'token_name' => 'csrf_token',
                'cookie_name' => 'csrf_cookie',
                'expire' => 7200,
                'secure' => false,
                'http_only' => true,
                'same_site' => null,
            ],
            'encryption' => [
                'cipher' => 'AES-256-CBC',
                'key' => 'random_key_32_bytes_long',
                'cipher_mode' => 'CBC'
            ],
            'log' => [
                'name' => 'app',
                'driver' => 'file',
                'path' => ROOT_PATH . '/var/logs',
                'level' => 'debug',
            ]
        ];
    }
};
