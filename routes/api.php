<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChannelsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PersonalAccessTokenController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UsersController::class, 'index']);
Route::get('/users/{user}', [UsersController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);

Route::get('/channels', [ChannelsController::class, 'index']);
Route::get('/channels/{channel}', [ChannelsController::class, 'show']);

Route::get('/playlists', [PlaylistController::class, 'index']);
Route::get('/playlists/{playlist}', [PlaylistController::class, 'show']);

Route::get('/videos', [VideoController::class, 'index']);
Route::get('/videos/{video}', [VideoController::class, 'show']);

Route::get('/comments', [CommentController::class, 'index']);
Route::get('/comments/{comment}', [CommentController::class, 'show']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/comments', [CommentController::class, 'store']);
    Route::put('/comments/{comment}', [CommentController::class, 'update']);
    Route::delete('/comments/{comment}', [CommentController::class, 'delete']);

    Route::delete('/personal-access-tokens', [PersonalAccessTokenController::class, 'delete']);
});


Route::post('/personal-access-tokens', [PersonalAccessTokenController::class, 'store']);
