<?php

namespace App\infra\services;

use App\application\gateway\CreateCustomerGateway;
use App\domain\entity\CustomerEntity;
use App\infra\persistence\repository\contract\CustomerRepository;

class CreateCustomerService implements CreateCustomerGateway
{
    private CustomerRepository $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    function create(CustomerEntity $customer): void
    {
        $this->repository->create($customer);
    }
}
