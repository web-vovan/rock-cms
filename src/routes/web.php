<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function() {
    return view('rock.cms::test');
});

Route::get('/test2', function() {
    return view('rock.cms::test2');
});
