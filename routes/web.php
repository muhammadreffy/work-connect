<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front.home');
});

Route::get('/signup', function () {
    return view('auth.signup');
});

Route::get('/signin', function () {
    return view('auth.signin');
});

Route::get('/categories', function () {
    return view('front.categories.index');
});

Route::get('/detail', function () {
    return view('front.projects.detail');
});
