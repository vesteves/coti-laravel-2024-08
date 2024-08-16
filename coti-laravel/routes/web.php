<?php

use App\Http\Controllers\GamesController;
use App\Http\Controllers\ServerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/servidores')->controller(ServerController::class)->name('servers.')->group(function () {
    Route::get('/', "index")->name('index');
    Route::get('/criar', "create")->name('create');
    Route::post('/', "store")->name('store');
    Route::get('/{server}', 'edit')->name('edit');
    Route::put('/{server}', 'update')->name('update');
    Route::delete('/{server}', 'destroy')->name('destroy');
});

Route::prefix('/jogos')->controller(GamesController::class)->name('games.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/criar', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{game}', 'edit')->name('edit');
    Route::put('/{game}', 'update')->name('update');
    Route::delete('/{game}', 'destroy')->name('destroy');
});

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