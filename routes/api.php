<?php

use App\infra\entrypoint\controller\CreateOrderController;
use App\infra\entrypoint\controller\CreateProductController;
use \App\infra\entrypoint\controller\CreateCustomerController;
use Illuminate\Support\Facades\Route;

Route::post('/customers', [CreateCustomerController::class, 'perform'])->name('customers.createCustomer');
Route::post('/products', [CreateProductController::class, 'perform'])->name('products.createProduct');
Route::post('/orders', [CreateOrderController::class, 'perform'])->name('orders.createOrder');
