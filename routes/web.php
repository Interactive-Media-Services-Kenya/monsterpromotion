<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/admin/dashboard', [App\Http\Controllers\QuizController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/add-quiz', [App\Http\Controllers\QuizController::class, 'add'])->name('add.quiz');
Route::post('admin/save-answer', [App\Http\Controllers\QuizController::class, 'storeQuestion'])->name('admin/save-answer');
Route::get('admin/manage-questions', [App\Http\Controllers\QuizController::class, 'manageQuestions'])->name('admin/manage-questions');
Route::get('admin/disable-question', [App\Http\Controllers\QuizController::class, 'disableQuestions'])->name('admin/disable-question');
Route::get('user/play-trivia', [App\Http\Controllers\QuizController::class, 'playQuiz'])->name('user/play-trivia');
Route::get('user/start-trivia', [App\Http\Controllers\QuizController::class, 'startQuiz'])->name('user/start-trivia');
