<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\OtherController;


// Rota inicial
Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware(['auth', 'verified']);

// Rotas
Route::resource('/user', UserController::class)->middleware(['auth', 'verified']);
Route::resource('/pizza', PizzaController::class)->middleware(['auth', 'verified']);
Route::resource('/other', OtherController::class)->middleware(['auth', 'verified']);

// DOM PDF
Route::get('/report/user', [UserController::class, 'report']) -> name('report.user')->middleware(['auth', 'verified']);
Route::get('/report/pizza', [PizzaController::class, 'report']) -> name('report.pizza')->middleware(['auth', 'verified']);
Route::get('/report/other', [OtherController::class, 'report']) -> name('report.other')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
