<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\TrailerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    // User info
    Route::get('/user', [UserController::class, 'show']);
    Route::get('/users', [UserController::class, 'index']);

    // Shows
    Route::post('/show', [ShowController::class, 'store']);
    Route::patch('/show/{show}', [ShowController::class, 'update']);
    Route::delete('/show/{show}', [ShowController::class, 'destroy']);

    // Episodes
    Route::post('/episode', [EpisodeController::class, 'store']);
    Route::patch('/episode/{episode}', [EpisodeController::class, 'update']);
    Route::delete('/episode/{episode}', [EpisodeController::class, 'destroy']);


    // Trailers
    Route::post('/trailer', [TrailerController::class, 'store']);
    Route::patch('/trailer/{trailer}', [TrailerController::class, 'update']);
    Route::delete('/trailer/{trailer}', [TrailerController::class, 'destroy']);

    // Comments
    Route::post('/comment', [CommentController::class, 'store']);
    Route::patch('/comment/{comment}', [CommentController::class, 'update']);
    Route::delete('/comment/{comment}', [CommentController::class, 'destroy']);
});

// Shows
Route::get('/show', [ShowController::class, 'index']);
Route::get('/show/{show}', [ShowController::class, 'show']);
Route::get('/show/search/{search}', [ShowController::class, 'search']);

// Episodes
Route::get('/episode', [EpisodeController::class, 'index']);
Route::get('/episode/{episode}', [EpisodeController::class, 'show']);

// Categories
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{category}', [CategoryController::class, 'show']);
