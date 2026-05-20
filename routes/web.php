<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');
Route::post('/movies/{movie}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::middleware('admin')->group(function () {
  Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
  Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
  Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
  Route::put('/movies/{movie}', [MovieController::class, 'update'])->name('movies.update');
  Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');
});