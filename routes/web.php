<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/customers/create', function () {
    \Barryvdh\Debugbar\Facades\Debugbar::info("render");
    return view('customer/create');
});
