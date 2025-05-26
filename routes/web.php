<?php

use Illuminate\Support\Facades\Route;
use Vfjodorovs12\UsersStat\Http\Controllers\UsersStatController;

Route::group(['namespace' => 'Vfjodorovs12\UsersStat\Http\Controllers', 'middleware' => ['web', 'auth']], function () {
    Route::get('/users-stat/pilots-stats', [UsersStatController::class, 'index'])->name('users-stat.pilots-stats');
});
