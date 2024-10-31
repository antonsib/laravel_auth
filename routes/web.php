<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware;

Route::get('/', function () {
    return view('welcome');
});

Route::name('user.')->group(function() {
    Route::view('/private', 'private')->middleware('auth')->name('private');

    Route::get('/login', function() {
        if(Auth::check()) {
            return redirect(route('user.private'));
        }
        return view('login');
    })->name('login');

    Route::get('/registration', function() {
        if(Auth::check()) {
            return redirect(route('user.private'));
        }
        return view('registration');
    })->name('registration');

   Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login'] );

    Route::get('/logout', function() {
        Auth::logout();
        return redirect("/");
    })->name('logout');

    Route::post('/registration', [\App\Http\Controllers\RegisterController::class, 'save']);
});
