<?php

namespace App\infra\services\order;

use App\application\gateway\order\CreateOrderGateway;
use App\domain\entity\Order;
use App\infra\persistence\repository\contract\OrderRepository;

class CreateOrderService implements CreateOrderGateway
{
    private OrderRepository $orderRepository;

    function  __construct(OrderRepository $repository)
    {
        $this->orderRepository =  $repository;
    }

    function create(Order $order): Order
    {
        return $this->orderRepository->create($order);
    }
}
