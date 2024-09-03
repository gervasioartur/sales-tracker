<?php

use App\infra\entrypoint\controller\CreateCustomerController;
use App\infra\entrypoint\controller\CreateOrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// customer
Route::get('/customers/create', [CreateCustomerController::class, 'index'])->name('customers.index');

Route::get('/products/create', function () {
    return view('product.create');
})->name('products.create');

//order
Route::get('/orders/create', [CreateOrderController::class, 'index'])->name('orders.index');

