<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('gym/', function () {
    return view('home');
})->name('home');

Route::get('gym/login', [UserController::class, 'loginForm'])->name('login.create');
Route::post('gym/login', [UserController::class, 'login'])->name('login');

