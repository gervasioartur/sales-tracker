<?php

namespace App\infra\services\order;

use App\application\gateway\order\UpdateOrderGateway;
use App\domain\entity\Order;
use App\domain\entity\OrderItem;
use App\infra\persistence\repository\contract\OrderRepository;

class UpdateOrderIdService implements UpdateOrderGateway
{
    private OrderRepository $repository;

    function  __construct(OrderRepository $repository)
    {
        $this->$repository =  $repository;
    }

    /**
     * @return OrderItem[]|null
     */
    function update(Order $order): void
    {
        $this->repository->update($order);
    }
}
