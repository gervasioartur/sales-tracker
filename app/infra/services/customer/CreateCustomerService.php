<?php

namespace App\infra\services\customer;

use App\application\gateway\customer\CreateCustomerGateway;
use App\domain\entity\Customer;
use App\infra\mapper\CustomerMapper;
use App\infra\persistence\repository\contract\CustomerRepository;

class CreateCustomerService implements CreateCustomerGateway
{
    private CustomerRepository $repository;
    private CustomerMapper $mapper;

    public function __construct(CustomerRepository $repository, CustomerMapper $mapper)
    {
        $this->repository = $repository;
        $this->mapper = $mapper;
    }

    function create(Customer $customer): Customer
    {
        $data = $this->mapper->formEntity($customer);
        return $this->repository->create($data);
    }
}
