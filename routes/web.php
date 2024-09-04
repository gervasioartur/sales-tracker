<?php

use App\infra\entrypoint\controller\CreateCustomerController;
use App\infra\entrypoint\controller\CreateOrderController;
use Illuminate\Support\Facades\Route;
use \App\infra\entrypoint\controller\CreateProductController;

Route::get('/', function () {
    return view('welcome');
});

// customer
Route::get('/customers/create', [CreateCustomerController::class, 'index'])->name('customers.index');
//order
Route::get('/orders/create', [CreateOrderController::class, 'index'])->name('orders.index');
//products
Route::get('/products/create', [CreateProductController::class, 'index'])->name('products.index');
