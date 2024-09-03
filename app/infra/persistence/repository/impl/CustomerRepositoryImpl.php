<?php

namespace App\infra\repository\impl;

use App\domain\entity\Customer;
use App\infra\repository\contract\CustomerRepository;

class CustomerRepositoryImpl implements CustomerRepository
{
    function create(Customer $customer): Customer
    {

    }

    function findByEmail(string $email): Customer
    {
        // TODO: Implement findByEmail() method.
    }

}
