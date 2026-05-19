<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::resource('movies', MovieController::class);
Route::post('movies/{movie}/reviews', [ReviewController::class, 'store'])->name('reviews.store');