<?php

namespace App\infra\services\order;

use App\application\gateway\order\CreateOrderItemGateway;
use App\domain\entity\OrderItem;
use App\infra\persistence\repository\contract\OrderItemRepository;
use App\infra\persistence\repository\contract\OrderRepository;

class CreateOrderItemService implements CreateOrderItemGateway
{
    private OrderRepository $repository;
    function __construct(OrderItemRepository $repository)
    {
        $this->repository= $repository;
    }

    function create(OrderItem $orderItem): OrderItem
    {
        return $this->repository->create($orderItem);
    }
}
