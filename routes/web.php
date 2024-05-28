<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/admin/dashboard', [App\Http\Controllers\QuizController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/add-quiz', [App\Http\Controllers\QuizController::class, 'add'])->name('add.quiz');
Route::post('admin/save-answer', [App\Http\Controllers\QuizController::class, 'storeQuestion'])->name('admin/save-answer');
Route::get('admin/manage-questions', [App\Http\Controllers\QuizController::class, 'manageQuestions'])->name('admin/manage-questions');
