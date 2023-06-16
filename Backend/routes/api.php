<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\SubtitleController;
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

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    // Users
    Route::get('/users', [UserController::class, 'index']);

    // Shows
    Route::post('/show', [ShowController::class, 'store']);
    Route::patch('/show/{show}', [ShowController::class, 'update']);
    Route::delete('/show/{show}', [ShowController::class, 'destroy']);

    // Episodes
    Route::get('/episode', [EpisodeController::class, 'index']);
    Route::post('/episode', [EpisodeController::class, 'store']);
    Route::patch('/episode/{episode}', [EpisodeController::class, 'update']);
    Route::delete('/episode/{episode}', [EpisodeController::class, 'destroy']);
    Route::get('/shows-and-episodes', [ShowController::class, 'showsWithEpisodes']);

    // Trailers
    Route::post('/trailer', [TrailerController::class, 'store']);
    Route::patch('/trailer/{trailer}', [TrailerController::class, 'update']);
    Route::delete('/trailer/{trailer}', [TrailerController::class, 'destroy']);
    Route::get('/shows-and-trailers', [ShowController::class, 'showsWithTrailers']);

    // Subtitles
    Route::post('/subtitle', [SubtitleController::class, 'store']);
    Route::patch('/subtitle/{subtitle}', [SubtitleController::class, 'update']);
    Route::delete('/subtitle/{subtitle}', [SubtitleController::class, 'destroy']);
    Route::get('/shows-and-subtitles', [ShowController::class, 'showsWithSubtitles']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    // User info
    Route::get('/user', [UserController::class, 'show']);

    // Comments
    Route::post('/comment', [CommentController::class, 'store']);
    Route::patch('/comment/{comment}', [CommentController::class, 'update']);
    Route::delete('/comment/{comment}', [CommentController::class, 'destroy']);

    // Rating
    Route::get('/rating/{id}', [RatingController::class, 'show']);
    Route::post('/rating', [RatingController::class, 'store']);
});

// Shows
Route::get('/show', [ShowController::class, 'index']);
Route::get('/show/{show}', [ShowController::class, 'show']);
Route::get('/show/search/{search}', [ShowController::class, 'search']);
Route::get('/shows/latest_anime', [ShowController::class, 'latestAnime']);
Route::get('/shows/latest_live_action', [ShowController::class, 'latestLiveAction']);

// Rating
Route::post('/rating', [RatingController::class, 'store']);


// Episodes
Route::get('/episode/{episode}', [EpisodeController::class, 'show']);

// Categories
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{category}', [CategoryController::class, 'show']);
