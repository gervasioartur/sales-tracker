<?php

namespace App\infra\repository\contract;

use App\domain\entity\Customer;

interface CustomerRepository
{
    function  create(Customer $customer): Customer;
    function  findByEmail(string $email): Customer;
}
