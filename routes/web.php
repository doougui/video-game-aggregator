<?php

use App\Http\Controllers\GamesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('games', [GamesController::class, 'index'])->name('games.index');
Route::get('games/{slug}', [GamesController::class, 'show'])->name('games.show');
Route::redirect('/', '/games');

require __DIR__.'/auth.php';
