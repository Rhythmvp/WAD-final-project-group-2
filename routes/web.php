<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Homepage
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home.index');   // Make sure home/index.blade.php exists
});


/*
|--------------------------------------------------------------------------
| Peer Consultation Forum (Your CRUD)
|--------------------------------------------------------------------------
*/

Route::resource('forum', ForumController::class);
Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create');
Route::get('/forum/featured', [ForumController::class, 'featured'])->name('forum.featured');
Route::get('/forum/general', [ForumController::class, 'general'])->name('forum.general');
Route::get('/forum/{id}', [ForumController::class, 'show'])->name('forum.show');

// This automatically creates:
// GET /forum
// GET /forum/create
// POST /forum
// GET /forum/{id}
// GET /forum/{id}/edit
// PUT /forum/{id}
// DELETE /forum/{id}


/*
|--------------------------------------------------------------------------
| Mental Health Quiz (CRUD)
|--------------------------------------------------------------------------
*/

Route::resource('quiz', QuizController::class);


/*
|--------------------------------------------------------------------------
| Diary Journal + Mood Tracker (CRUD)
|--------------------------------------------------------------------------
*/

Route::resource('diary', DiaryController::class);


/*
|--------------------------------------------------------------------------
| Lifestyle Challenges (CRUD)
|--------------------------------------------------------------------------
*/

Route::resource('challenges', ChallengeController::class);


/*
|--------------------------------------------------------------------------
| Clinics & Counselors Directory (CRUD)
|--------------------------------------------------------------------------
*/

Route::resource('clinics', ClinicController::class);


/*
|--------------------------------------------------------------------------
| Admin Dashboard
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

    // Main admin page
    Route::get('/', function () {
        return view('admin.admin');
    });

    // Manage users
    Route::get('/users', [UserController::class, 'index']);

    // Manage forum posts
    Route::get('/forum', [ForumController::class, 'adminIndex']);

    // Manage challenges
    Route::get('/challenges', [ChallengeController::class, 'adminIndex']);

    // Manage clinics
    Route::get('/clinics', [ClinicController::class, 'adminIndex']);

    // Manage quiz
    Route::get('/quiz', [QuizController::class, 'adminIndex']);
});
