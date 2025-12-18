<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\ForumController;

/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home.index');
})->name('home');

/*
|--------------------------------------------------------------------------
| Quiz routes (auth)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
    Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/quiz/history', [QuizController::class, 'history'])->name('quiz.history');
});

/*
|--------------------------------------------------------------------------
| Challenges routes (auth)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::resource('challenges', ChallengeController::class);
});

/*
|--------------------------------------------------------------------------
| Clinics routes (auth) ✅ SAFEST
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::resource('clinics', ClinicController::class)
        ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
});

/*
|--------------------------------------------------------------------------
| Diary routes (auth)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::resource('diary', DiaryController::class);
});

/*
|--------------------------------------------------------------------------
| Forum routes (auth)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::resource('forum', ForumController::class);
});

/*
|--------------------------------------------------------------------------
| Admin routes (auth + admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', function () {
            return view('admin.admin');
        })->name('dashboard');

        Route::resource('users', UserController::class)
            ->only(['index', 'edit', 'update', 'destroy']);
    });

/*
|--------------------------------------------------------------------------
| Auth routes
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
