<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PizzaController;

// Rota inicial
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
return view('home');
})->name('home');

// Rotas
Route::resource('/user', UserController::class);
Route::resource('/pizza', PizzaController::class);