<?php

namespace App\infra\persistence\repository\contract;


use App\infra\persistence\model\Customer;

interface CustomerRepository
{
    function create(array $data): Customer;

    function findByEmail(string $email): Customer;
}
