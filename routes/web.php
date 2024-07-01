<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('index');
});
Route::get('/user/play-games', function () {
    return view('games');
});

Route::get('/v1/admin/login', function () {
    return redirect()->route('login');
});
// Route::middleware(['web'])->group(function () {
//     Auth::routes();
// });
Route::get('/v1/admin/login', [App\Http\Controllers\StaffController::class, 'showLoginForm'])->name('login');
Route::post('/logout', [App\Http\Controllers\StaffController::class, 'logout'])->name('logout');
Route::get('/admin/dashboard', [App\Http\Controllers\QuizController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/add-quiz', [App\Http\Controllers\QuizController::class, 'add'])->name('add.quiz');
Route::post('admin/save-answer', [App\Http\Controllers\QuizController::class, 'storeQuestion'])->name('admin/save-answer');
Route::get('admin/manage-questions', [App\Http\Controllers\QuizController::class, 'manageQuestions'])->name('admin/manage-questions');
Route::get('admin/disable-question', [App\Http\Controllers\QuizController::class, 'disableQuestions'])->name('admin/disable-question');
Route::get('admin/manage-pending-orders', [App\Http\Controllers\UserController::class, 'pendingRequests'])->name('manage.pending.users');
Route::get('admin/update-user', [App\Http\Controllers\UserController::class, 'updateUser'])->name('update-user');

Route::get('user/play-trivia/{id}', [App\Http\Controllers\QuizController::class, 'playQuiz'])->name('user/play-trivia');
Route::get('user/start-trivia/{id}', [App\Http\Controllers\QuizController::class, 'startQuiz'])->name('user/start-trivia');
Route::get('user/music-game/{id}', [App\Http\Controllers\QuizController::class, 'musicQuiz'])->name('user/music-game');

Route::get('user/select-question', [App\Http\Controllers\QuizController::class, 'selectQuiz'])->name('user/select-question');
Route::post('user/save-score', [App\Http\Controllers\QuizController::class, 'saveScore'])->name('save-score');
Route::get('user/my-results', [App\Http\Controllers\QuizController::class, 'myScore'])->name('user/my-results');
//Route::post('user/save-quiz-answers', [App\Http\Controllers\QuizController::class, 'viewScore'])->name('save-quiz-answers');
Route::get('user/leaders-board', [App\Http\Controllers\QuizController::class, 'leadersBoard'])->name('leaders-board');
Route::get('user/terms-conditions', [App\Http\Controllers\QuizController::class, 'terms'])->name('terms-conditions');
