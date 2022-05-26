<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')
    ->prefix('admin')
    ->group(function() {
        Route::get('/', function () {
            return view('rock-cms::admin.index');
        })->name('home');
    });

Route::middleware('auth')->post('/admin/logout', [\Webvovan\RockCms\Http\Controllers\AuthController::class, 'logout']);

Route::middleware('guest')
    ->group(function () {
        Route::get('/admin/login', function () {
            return view('rock-cms::auth.login');
        })->name('login');

        Route::post('/admin/login', [\Webvovan\RockCms\Http\Controllers\AuthController::class, 'login']);
    });
