<?php

namespace App\infra\persistence\repository\contract;

use App\domain\entity\Customer;

interface CustomerRepository
{
    function create(array $data): Customer;

    function findByEmail(string $email): ?Customer;

    function list(): ?array;
}
