<?php

namespace Vfjodorovs12\UsersStat;

use Seat\Services\AbstractSeatPlugin;

class UsersStatServiceProvider extends AbstractSeatPlugin
{
    public function getName(): string
    {
        return 'UsersStat - Статистика пользователей и флот';
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

    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'users-stat');
    }
}
