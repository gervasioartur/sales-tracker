<?php

namespace App\infra\services\order;

use App\application\gateway\order\CreateOrderItemGateway;
use App\domain\entity\OrderItem;
use App\infra\mapper\OrderItemMapper;
use App\infra\persistence\repository\contract\OrderItemRepository;

class CreateOrderItemService implements CreateOrderItemGateway
{
    private OrderItemRepository $repository;
    private OrderItemMapper $mapper;

    function __construct(OrderItemRepository $repository, OrderItemMapper $mapper)
    {
        $this->repository = $repository;
        $this->mapper = $mapper;
    }

    function create(OrderItem $orderItem): OrderItem
    {
        $data = $this->mapper->formEntity($orderItem);
        return $this->repository->create($data);
    }
}
