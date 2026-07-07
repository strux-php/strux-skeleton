<?php

declare(strict_types=1);

namespace App\Config;

use App\Domain\Identity\Entity\User;
use Strux\Component\Config\ConfigInterface;

class Auth implements ConfigInterface
{
    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            /*
            |--------------------------------------------------------------------------
            | Authentication Defaults
            |--------------------------------------------------------------------------
            |
            | This option controls the default authentication "sentinel" and the
            | default path user is redirected to after successful login if no
            | specific 'next' parameter is present.
            |
            */
            'defaults' => [
                'sentinel' => 'web', // Default sentinel name
                'redirect_to' => '/', // Default route name or path after login
                'login_route' => 'auth.login', // Default login route name
                'redirect_map' => [],
                'next_parameter' => 'next', // The query parameter for intended URL
            ],

            /*
            |--------------------------------------------------------------------------
            | Sentinels
            |--------------------------------------------------------------------------
            |
            | Here you may define all the sentinels for your application as
            | well as their drivers. You can even define multiple sentinels for
            | the same driver if you have different user tables.
            |
            | Supported Drivers: "session", "token"
            |
            */
            'sentinels' => [
                'web' => [
                    'driver' => 'session',
                    'model' => User::class, // The user model for this sentinel
                ],

                'api' => [
                    'driver' => 'token',
                    // 'model' => User::class,
                    'storage_key' => 'api_token', // The column name for the API token
                ],
            ]
        ];
    }
}
