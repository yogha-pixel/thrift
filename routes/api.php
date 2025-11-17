<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// API AUTH
Route::post('/register', [AuthController::class, 'apiRegister']);
Route::post('/login', [AuthController::class, 'apiLogin']);
