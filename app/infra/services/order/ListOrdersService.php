<?php

namespace App\infra\services\order;

use App\application\gateway\order\ListOrdersGateway;
use App\infra\persistence\repository\contract\OrderRepository;

class ListOrdersService implements ListOrdersGateway
{
    private OrderRepository $repository;
    function  __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    function list(): ?array
    {
       return  $this->repository->list();
    }
}
