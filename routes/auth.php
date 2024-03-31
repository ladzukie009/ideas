<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// registration
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);

// login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

// logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
