<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------|
|                                 API Routes                               |
|--------------------------------------------------------------------------|
*/

/* Auth */
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);

/* User */
Route::post('user/create', [UserController::class, 'create']);

Route::prefix('user')->middleware('auth:api')->group(function () {
    Route::put('/update', [UserController::class, 'update']);
    Route::delete('/delete', [UserController::class, 'delete']);
    Route::get('/read', [UserController::class, 'read']);
});