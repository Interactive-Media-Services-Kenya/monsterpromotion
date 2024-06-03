<?php

use Illuminate\Support\Facades\Route;

Route::post('user/send-otp', [App\Http\Controllers\QuizController::class, 'sendOTP'])->name('send-otp');
Route::post('user/upload-photo', [App\Http\Controllers\QuizController::class, 'sesndOTP'])->name('upload-photo');
Route::post('user/save-user-details', [App\Http\Controllers\QuizController::class, 'saveSelfie'])->name('save-user-details');
