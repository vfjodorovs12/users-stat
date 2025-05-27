<?php

namespace Vfjodorovs12\UsersStat;

use Illuminate\Support\ServiceProvider;

class ServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'usersstat');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    public function register()
    {
    }
}
