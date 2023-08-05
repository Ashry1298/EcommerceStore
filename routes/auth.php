<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Front\AuthController;
use Illuminate\Support\Facades\Route;

Route::view('/register', 'auth.register');
Route::view('/login', 'auth.login');

Route::post('/register', [AuthController::class, 'handleRegister'])->name('auth.register');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
