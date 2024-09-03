<?php

namespace App\infra\services;

use App\application\gateway\FindCustomerByEmailGateway;
use App\domain\entity\CustomerEntity;
use App\infra\mapper\CustomerMapper;
use App\infra\persistence\repository\contract\CustomerRepository;

class FindCustomerByEmailService implements FindCustomerByEmailGateway
{
    private CustomerRepository $repository;
    private CustomerMapper $mapper;

    public function __construct(CustomerRepository $repository, CustomerMapper $mapper)
    {
        $this->repository = $repository;
        $this->mapper = $mapper;
    }

    function find(string $email): ?CustomerEntity
    {
        $customer = $this->repository->findByEmail($email);
        return $this->mapper->toEntity($customer);
    }
}
