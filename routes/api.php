<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Grouping jika ada banyak route yang memiliki middleware yang sama
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/profile', [AuthenticationController::class, 'profile']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::post('/comment', [CommentController::class, 'store']);

    Route::middleware(['pemilik-komentar'])->group(function () {
        Route::patch('/comment/{id}', [CommentController::class, 'update']);
        Route::delete('/comment/{id}', [CommentController::class, 'destroy']);
    });

    Route::middleware(['pemilik-postingan'])->group(function (){
        Route::patch('/posts/{id}', [PostController::class, 'update']);
        Route::delete('/posts/{id}', [PostController::class, 'destroy']);
    });
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/{id}', [PostController::class, 'show']);


Route::post('/login', [AuthenticationController::class, 'login']);