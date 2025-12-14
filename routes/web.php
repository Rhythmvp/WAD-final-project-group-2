<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('home');
})->name('home');

// Quiz routes (require authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
    Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/quiz/history', [QuizController::class, 'history'])->name('quiz.history');
});

// Admin routes (require authentication and admin role)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
});

// Auth routes
require __DIR__.'/auth.php';