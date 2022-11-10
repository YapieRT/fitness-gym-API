<?php

use App\Http\Controllers\OrganizerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::get('logout', [UserController::class, 'logout']);

// Show All Customers
Route::get('organizer',
[OrganizerController::class, 'index']);

// Add New Customer
Route::post('organizer',
[OrganizerController::class, 'store']);