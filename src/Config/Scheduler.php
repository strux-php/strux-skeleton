<?php

declare(strict_types=1);

namespace App\Config;

use Strux\Component\Config\ConfigInterface;

return new class implements ConfigInterface {
    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            /*
            |--------------------------------------------------------------------------
            | Additional Task Discovery Directories
            |--------------------------------------------------------------------------
            |
            | The scheduler automatically scans the application's src/ directory for
            | classes with the #[Schedule] attribute. You can add extra directories
            | here for packages or shared modules.
            |
            */
            'directories' => [
                // 'vendor/example/module/src',
            ],

            /*
            |--------------------------------------------------------------------------
            | Default Timezone
            |--------------------------------------------------------------------------
            |
            | The timezone used when evaluating cron expressions. If not set, the
            | server's default timezone is used. You can also override this per-task
            | using the timezone parameter on the #[Schedule] attribute.
            |
            */
            'timezone' => env('SCHEDULER_TIMEZONE', 'UTC'),

            /*
            |--------------------------------------------------------------------------
            | Allowed Environments
            |--------------------------------------------------------------------------
            |
            | Restrict the scheduler to specific environments. Set to an empty array
            | to allow all environments. The current environment is determined by the
            | APP_ENV constant or environment variable.
            |
            */
            'environments' => [
                // 'production',
                // 'staging',
            ],

            /*
            |--------------------------------------------------------------------------
            | Skip in Maintenance Mode
            |--------------------------------------------------------------------------
            |
            | When enabled, the scheduler will skip all tasks while the application
            | is in maintenance mode. This prevents scheduled jobs from running
            | during deployments or maintenance windows.
            |
            */
            'skip_in_maintenance' => true,
        ];
    }
};
