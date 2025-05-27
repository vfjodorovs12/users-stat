<?php

namespace Vfjodorovs12\UsersStat;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        // Подключение маршрутов, шаблонов и миграций
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'usersstat');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // Регистрируем пункт меню в Eve Seat
        $this->app->booted(function () {
            if (app()->bound('seat.menu')) {
                app('seat.menu')->add([
                    'name' => 'Статистика пилотов',
                    'icon' => 'fa fa-users',
                    'route' => 'usersstat.index', // Имя вашего маршрута в routes/web.php
                    'permission' => null, // Можно указать нужные права доступа или оставить null
                ]);
            }
        });
    }

    public function register()
    {
        //
    }
}
