<?php
declare(strict_types=1);

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;
use League\Container\Container;

class ContainerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Container::class, function ($app) {
            return \DI\Container::instance();
        });
    }
}
