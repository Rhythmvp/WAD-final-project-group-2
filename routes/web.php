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
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/', function () {
            return view('admin.admin');
        })->name('dashboard');

        // Users
        Route::get('/users', [UserController::class, 'index'])->name('users');

        // Forum moderation
        Route::get('/forum', [ForumController::class, 'adminIndex'])->name('forum');

        // Challenges
        Route::get('/challenges', [ChallengeController::class, 'adminIndex'])->name('challenges');

        // Clinics
        Route::get('/clinics', [ClinicController::class, 'adminIndex'])->name('clinics');

        // Quiz
        Route::get('/quiz', [QuizController::class, 'adminIndex'])->name('quiz');
});


// Auth routes
require __DIR__.'/auth.php';