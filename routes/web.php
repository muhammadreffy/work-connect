<?php

use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use App\Http\Middleware\RedirectIfAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front.home');
})->name('home');

Route::name('auth.')->middleware(RedirectIfAuth::class)->group(function () {
    Route::get('/signup', [SignupController::class, 'index'])->name('signup');
    Route::post('/signup-store', [SignupController::class, 'store'])->name('signup-store');

    Route::get('/signin', [SigninController::class, 'index'])->name('signin');
    Route::post('/signin', [SigninController::class, 'authenticate'])->name('signin-authenticate');

    Route::post('/logout', [SigninController::class, 'logout'])
        ->withoutMiddleware(RedirectIfAuth::class)->name('logout');
});
