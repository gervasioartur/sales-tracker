<?php

namespace App\infra\services\order;

use App\application\gateway\order\CreateOrderGateway;
use App\domain\entity\Order;
use App\infra\mapper\OrderMapper;
use App\infra\persistence\repository\contract\OrderRepository;

class CreateOrderService implements CreateOrderGateway
{
    private OrderRepository $orderRepository;
    private OrderMapper $mapper;

    function __construct(OrderRepository $repository, OrderMapper $mapper)
    {
        $this->orderRepository = $repository;
        $this->mapper = $mapper;
    }

    function create(Order $order): Order
    {
        $data = $this->mapper->fromEntity($order);
        return $this->orderRepository->create($data);
    }
}
