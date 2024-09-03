<?php

namespace App\infra\persistence\repository\impl;

use App\infra\persistence\model\Customer;
use App\infra\persistence\repository\contract\CustomerRepository;
use Illuminate\Support\Facades\Log;

class CustomerRepositoryImpl implements CustomerRepository
{
    function create(array $data): Customer
    {
        $customer = new $this->model($data);
        $customer->fill($data);
        $customer->save();
        return $customer;
    }

    function findByEmail(string $email): Customer
    {
        Log::channel('stderr')->info("Teste");
        return Customer::where('email', $email)->first();
    }

}
