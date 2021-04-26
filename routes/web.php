<?php

use App\Http\Controllers\GamesController;
use App\Http\Controllers\ProfilesController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::get('games', [GamesController::class, 'index'])->name('games.index');
    Route::get('games/{slug}', [GamesController::class, 'show'])->name('games.show');
    Route::redirect('/', '/games');

    require __DIR__.'/auth.php';

    Route::middleware('auth')->group(function () {
        Route::get('/nickname', fn() => view('auth.choose-nickname'))
            ->name('nickname');

        Route::get('/profile', [ProfilesController::class, 'edit'])
            ->middleware('password.confirm')
            ->name('profiles.edit');

        Route::put('/profile', [ProfilesController::class, 'update'])
            ->middleware('password.confirm');
    });
});
