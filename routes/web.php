<?php

use Illuminate\Support\Facades\Route;
use Vfjodorovs12\UsersStat\Http\Controllers\UsersStatController;

Route::group(['middleware' => ['web']], function () {
    Route::get('/users-stat', [UsersStatController::class, 'index'])
        ->name('usersstat.index');
});