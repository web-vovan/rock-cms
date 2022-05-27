<?php

use Illuminate\Support\Facades\Route;
use Webvovan\RockCms\Http\Controllers\AuthController;

Route::middleware(['web'])->group(function() {
    Route::middleware(['auth'])->get('/admin', function() {
        return view('rock-cms::admin.index');
    })->name('home');

    Route::middleware(['auth'])->post('/admin/logout', [AuthController::class, 'logout']);

    Route::middleware(['guest'])->get('/admin/login', function () {
        return view('auth.login');
    })->name('login');

    Route::middleware(['guest'])->post('/admin/login', [AuthController::class, 'login']);
});
