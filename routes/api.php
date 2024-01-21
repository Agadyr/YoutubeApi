<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChannelsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UsersController::class, 'index']);
Route::get('/users/{user}', [UsersController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);

Route::get('/channels', [ChannelsController::class, 'index']);
Route::get('/channels/{channel}', [ChannelsController::class, 'show']);

Route::get('/videos', [VideoController::class, 'index']);
Route::get('/videos/{video}', [VideoController::class, 'show']);
