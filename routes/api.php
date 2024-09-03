<?php

use App\infra\entrypoint\controller\CreateProductController;
use Illuminate\Support\Facades\Route;

Route::post('/customers', [CreateCustomerController::class, 'perform'])->name('customers.createCustomer');
Route::post('/products', [CreateProductController::class, 'perform'])->name('products.createProduct');
