<?php

use App\infra\entrypoint\controller\CreateCustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/customers', [CreateCustomerController::class, 'perform'])->name('customers.createCustomer');
