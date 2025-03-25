<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\RolesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Public Routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('role', [RolesController::class, 'createRole']);
    Route::get('role', [RolesController::class, 'index']);
    Route::get('role/{id}', [RolesController::class, 'getRole']);
    Route::put('role/{id}', [RolesController::class, 'updateRole']);
    Route::delete('role/{id}', [RolesController::class, 'deleteRole']);
