<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\ForumController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('home.index');
})->name('home');

// Quiz routes (require authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
    Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/quiz/history', [QuizController::class, 'history'])->name('quiz.history');
});

// Challenge routes (require authentication)
Route::middleware(['auth'])->group(function () {
    Route::resource('challenges', ChallengeController::class);
});

// Clinic routes (require authentication)
Route::middleware(['auth'])->group(function () {
    Route::resource('clinics', ClinicController::class);
});

// Diary routes (require authentication)
Route::middleware(['auth'])->group(function () {
    Route::resource('diary', DiaryController::class);
});

// Forum routes (require authentication)
Route::middleware(['auth'])->group(function () {
    Route::resource('forum', ForumController::class);
});

// Admin routes (require authentication and admin role)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::get('/', function () {
        return view('admin.admin');
    })->name('dashboard');
});

// Auth routes
require __DIR__.'/auth.php';