<?php

namespace App\infra\services;

use App\application\gateway\customer\FindCustomerByEmailGateway;
use App\domain\entity\Customer;
use App\domain\entity\CustomerEntity;
use App\infra\persistence\repository\contract\CustomerRepository;

class FindCustomerByEmailService implements FindCustomerByEmailGateway
{
    private CustomerRepository $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    function find(string $email): ?Customer
    {
        return $this->repository->findByEmail($email);
    }
}
