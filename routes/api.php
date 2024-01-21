<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChannelsController;
use Illuminate\Support\Facades\Route;

Route::get('/categories', [CategoryController::class,'index']);
Route::get('/categories/{category}', [CategoryController::class,'show']);

Route::get('/channels', [ChannelsController::class, 'index']);
Route::get('/channels/{channel}', [ChannelsController::class,'show']);
