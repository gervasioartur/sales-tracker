<?php

use App\infra\entrypoint\controller\CreateCustomerController;
use Illuminate\Support\Facades\Route;

Route::post('/customers', [CreateCustomerController::class, 'perform'])->name('customers.createCustomer');
