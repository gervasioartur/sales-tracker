<?php

namespace App\infra\services;

use App\application\gateway\ListCustomersGateway;
use App\infra\persistence\repository\contract\CustomerRepository;


class ListCustomersService implements ListCustomersGateway
{
    private CustomerRepository $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    function list(): ?array
    {
        return $this->repository->list();
    }
}
