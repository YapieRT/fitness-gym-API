<?php

use App\Http\Controllers\OrganizerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Register New User
Route::post('register', [UserController::class, 'register']);

// Login User
Route::post('login', [UserController::class, 'login']);

// Logout User
Route::get('logout', [UserController::class, 'logout']);

// Show All Customers
Route::get('organizer', [OrganizerController::class, 'index']);

// Add New Customer
Route::post('organizer', [OrganizerController::class, 'store']);

// Show Customer
Route::get('organizer/{id}', [OrganizerController::class, 'show']);

// Delete Customer
Route::delete('organizer/{customer}', [OrganizerController::class, 'delete']);

// Show All Coaches On Home Page
Route::get('coaches', [HomeController::class, 'showCoaches']);
