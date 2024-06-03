<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
    return view('index');
});
Route::get('/user/play-games', function () {
    return view('games');
});
Route::get('/admin/dashboard', [App\Http\Controllers\QuizController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/add-quiz', [App\Http\Controllers\QuizController::class, 'add'])->name('add.quiz');
Route::post('admin/save-answer', [App\Http\Controllers\QuizController::class, 'storeQuestion'])->name('admin/save-answer');
Route::get('admin/manage-questions', [App\Http\Controllers\QuizController::class, 'manageQuestions'])->name('admin/manage-questions');
Route::get('admin/disable-question', [App\Http\Controllers\QuizController::class, 'disableQuestions'])->name('admin/disable-question');
Route::get('user/play-trivia', [App\Http\Controllers\QuizController::class, 'playQuiz'])->name('user/play-trivia');
Route::get('user/start-trivia', [App\Http\Controllers\QuizController::class, 'startQuiz'])->name('user/start-trivia');

Route::get('user/select-question', [App\Http\Controllers\QuizController::class, 'selectQuiz'])->name('user/select-question');
Route::post('user/save-score', [App\Http\Controllers\QuizController::class, 'saveScore'])->name('save-score');
Route::get('user/my-results', [App\Http\Controllers\QuizController::class, 'myScore'])->name('user/my-results');
Route::post('user/save-quiz-answers', [App\Http\Controllers\QuizController::class, 'viewScore'])->name('save-quiz-answers');
Route::post('user/send-otp', [App\Http\Controllers\QuizController::class, 'sendOTP'])->name('send-otp');
Route::post('user/upload-photo', [App\Http\Controllers\QuizController::class, 'sesndOTP'])->name('upload-photo');
Route::post('user/save-user-details', [App\Http\Controllers\QuizController::class, 'saveSelfie'])->name('save-user-details');
