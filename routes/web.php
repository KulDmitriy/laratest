<?php
require __DIR__.'/auth.php';

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LanguageController;

Route::get('/', function () {
    App::setLocale('ru');
    return view('welcome');
});

Route::get('/dashboard', [PageController::class, 'showDashboard'])
                ->middleware('auth')
                ->name('dashboard');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/edit-user/{id}', [PageController::class, 'userEdit'])
                ->name('user-info-edit');

    Route::post('/edit-user/{id}', [UsersController::class, 'userEditSubmit'])
                ->name('user-info-edit-submit');

    Route::post('/users-info', [PageController::class, 'showUsersInfoByFilter'])
                ->name('show-users-info-by-filter');

    Route::post('/users-info-abc', [PageController::class, 'showUsersInfoByAbc'])
                ->name('show-users-info-by-abc');
});

Route::get('/language/{lg}', function ($lg) {
    App::setLocale($lg);
    return view('welcome');
});

Route::get('/language/{lang}', [LanguageController::class, 'switchLang'])
                ->name('lang-switch');