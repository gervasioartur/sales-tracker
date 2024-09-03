<?php

use App\infra\entrypoint\controller\CreateCustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customers/create', [CreateCustomerController::class, 'index'])->name('customers.index');

