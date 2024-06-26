<?php

use Illuminate\Support\Facades\Route;


Route::post('user/upload-photo', [App\Http\Controllers\QuizController::class, 'sesndOTP'])->name('upload-photo');
Route::post('user/save-user-details', [App\Http\Controllers\QuizController::class, 'saveSelfie'])->name('save-user-details');
Route::middleware(['api', 'throttle:5,1'])->group(function () {
    Route::post('user/send-otp', [App\Http\Controllers\QuizController::class, 'sendOTP'])->name('send-otp');
    Route::post('user/get-category', [App\Http\Controllers\QuizController::class, 'getCategoryName'])->name('get-category');
});
Route::middleware(['api', 'throttle:70,1'])->group(function () {
    Route::post('user/check-trivia-result', [App\Http\Controllers\QuizController::class, 'getQuestionResult'])->name('check-trivia-result');
});
Route::post('user/save-quiz-attempt', [App\Http\Controllers\QuizController::class, 'saveansweredQuestion'])->name('save-quiz-attempt');
