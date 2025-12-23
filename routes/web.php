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
    Route::get('/studentchallenges', [ChallengeController::class, 'studentIndex'])->name('challenges.index');
    Route::get('/studentchallenges/{challenge}', [ChallengeController::class, 'studentShow'])->name('challenges.show');
    Route::post('/studentchallenges/{id}/join', [ChallengeController::class, 'join'])->name('challenges.join');
    Route::post('/studentchallenges/{id}/update-progress', [ChallengeController::class, 'updateProgress'])->name('challenges.updateProgress');
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
    Route::get('/challenges', [ChallengeController::class, 'index'])->name('challenges.index');
    Route::get('/challenges/create', [ChallengeController::class, 'create'])->name('challenges.create');
    Route::get('/challenges/{challenge}', [ChallengeController::class, 'show'])->name('challenges.show');
    Route::post('/challenges', [ChallengeController::class, 'store'])->name('challenges.store');
    Route::get('/challenges/{challenge}/edit', [ChallengeController::class, 'edit'])->name('challenges.edit');
    Route::put('/challenges/{challenge}', [ChallengeController::class, 'update'])->name('challenges.update');
    Route::delete('/challenges/{challenge}', [ChallengeController::class, 'destroy'])->name('challenges.destroy');
});

// Auth routes
require __DIR__.'/auth.php';