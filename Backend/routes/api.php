<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RecommendationController;
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
    Route::get('/show', [ShowController::class, 'index']);
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

    // Recommendations
    Route::get('/recommendation', [RecommendationController::class, 'index']);
    Route::post('/recommendation', [RecommendationController::class, 'store']);
    Route::patch('/recommendation/{recommendation}', [RecommendationController::class, 'update']);
    Route::delete('/recommendation/{recommendation}', [RecommendationController::class, 'destroy']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    // User
    Route::get('/user', [UserController::class, 'show']);
    Route::patch('/user/{user}', [UserController::class, 'update']);
    Route::delete('/user/{user}', [UserController::class, 'destroy']);

    // Comments
    Route::post('/comment', [CommentController::class, 'store']);
    Route::patch('/comment/{comment}', [CommentController::class, 'update']);
    Route::delete('/comment/{comment}', [CommentController::class, 'destroy']);

    // Rating
    Route::get('/rating', [RatingController::class, 'index']);
    Route::get('/rating/{id}', [RatingController::class, 'show']);
    Route::post('/rating', [RatingController::class, 'store']);
    Route::delete('/rating/{rating}', [RatingController::class, 'destroy']);

    // Favorites
    Route::get('/favorite', [FavoriteController::class, 'index']);
    Route::post('/favorite', [FavoriteController::class, 'store']);
    Route::get('/favorite/{id}', [FavoriteController::class, 'show']);
});

// Shows
Route::get('/show/{show}', [ShowController::class, 'show']);
Route::get('/show/search/{search}', [ShowController::class, 'search']);
Route::get('/shows/latest_anime', [ShowController::class, 'latestAnime']);
Route::get('/shows/latest_live_action', [ShowController::class, 'latestLiveAction']);

// Episodes
Route::get('/episode/{episode}', [EpisodeController::class, 'show']);

// Categories
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{category}', [CategoryController::class, 'show']);

// Recommendations
Route::get('/recommendation/anime', [RecommendationController::class, 'showAnime']);
Route::get('/recommendation/live-action', [RecommendationController::class, 'showLiveAction']);
