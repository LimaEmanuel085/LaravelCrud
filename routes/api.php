<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index']);

Route::post('/create', [UserController::class, 'store']);

Route::delete('/delete', [UserController::class, 'destroy']);

Route::put('/update', [UserController::class, 'update']);
