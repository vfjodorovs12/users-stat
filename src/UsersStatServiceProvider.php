<?php

namespace Vfjodorovs12\UsersStat;

use Illuminate\Support\ServiceProvider;
use Seat\Services\AbstractSeatPlugin;

class UsersStatServiceProvider extends AbstractSeatPlugin
{
    /**
     * Get the name of the plugin for SEAT UI.
     */
    public function getName(): string
    {
        return 'UsersStat - Статистика пользователей и флот';
    }

    /**
     * Get the plugin's GitHub repository URL.
     */
    public function getPackageRepositoryUrl(): string
    {
        return 'https://github.com/vfjodorovs12/users-stat';
    }

    /**
     * Get the composer package name.
     */
    public function getPackagistPackageName(): string
    {
        return 'users-stat';
    }

    /**
     * Get the composer vendor name.
     */
    public function getPackagistVendorName(): string
    {
        return 'vfjodorovs12';
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        // Можешь добавить регистрацию сервисов, если нужно
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Регистрируем файл меню для добавления пункта меню в SEAT
        $this->mergeConfigFrom(__DIR__ . '/../config/menu.php', 'menu.users-stat');

        // Регистрируем маршруты и шаблоны
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'users-stat');
    }
}
