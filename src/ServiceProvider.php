<?php

namespace Vfjodorovs12\UsersStat;

use Seat\Services\AbstractSeatPlugin;

class ServiceProvider extends AbstractSeatPlugin
{
    public function boot()
    {
        $this->add_routes();
        $this->add_views();
        $this->addMigrations();
    }

    public function add_routes()
    {
        if (! $this->app->routesAreCached()) {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        }
    }

    public function add_views()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'usersstat');
    }

    private function addMigrations()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations/');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/Config/usersstat.sidebar.php',
            'package.sidebar'
        );
    }

    // ОБЯЗАТЕЛЬНЫЕ МЕТОДЫ:
    public function getName(): string
    {
        return 'Users Stat';
    }

    public function getPackageRepositoryUrl(): string
    {
        return 'https://github.com/vfjodorovs12/users-stat';
    }

    public function getPackagistPackageName(): string
    {
        return 'users-stat';
    }

    public function getPackagistVendorName(): string
    {
        return 'vfjodorovs12';
    }
}
