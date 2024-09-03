<?php

namespace App\infra\services;

use App\application\gateway\FindCustomerByEmailGateway;
use App\domain\entity\Customer;
use App\domain\entity\CustomerEntity;
use App\infra\mapper\CustomerMapper;
use App\infra\persistence\repository\contract\CustomerRepository;
use Illuminate\Support\Facades\Log;
use PgSql\Lob;

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
