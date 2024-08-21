<?php

use App\Http\Controllers\GamesController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/servidores')->middleware('auth')->controller(ServerController::class)->name('servers.')->group(function () {
    Route::get('/', "index")->name('index')->withoutMiddleware('auth');
    Route::get('/criar', "create")->name('create');
    Route::post('/', "store")->name('store');
    Route::get('/{server}', 'edit')->name('edit');
    Route::put('/{server}', 'update')->name('update');
    Route::delete('/{server}', 'destroy')->name('destroy');
});

Route::prefix('/jogos')->middleware('auth')->controller(GamesController::class)->name('games.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/criar', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{game}', 'edit')->name('edit');
    Route::put('/{game}', 'update')->name('update');
    Route::delete('/{game}', 'destroy')->name('destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// MODEL -> VIEW -> CONTROLLER

// RESTful - API
// GET: Coletar informaçōes
// POST: Enviar informaçōes
// PUT: Atualizar informaçōes
// DELETE: Remover informaçōes

// GET    /assunto : listar dados sobre um assunto
// GET    /assunto/{id} : coletar informações sobre um único assunto
// PUT    /assunto/{id} : atualizar informações sobre um determinado assunto
// POST   /assunto : criar um registro do assunto
// DELETE /assunto/{id} : remover um assunto
