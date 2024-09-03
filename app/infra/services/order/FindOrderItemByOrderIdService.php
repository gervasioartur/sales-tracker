<?php

namespace App\infra\services\order;

use App\application\gateway\order\FindOrderItemByOrderIdGateway;
use App\domain\entity\OrderItem;
use App\infra\persistence\repository\contract\OrderItemRepository;

class FindOrderItemByOrderIdService implements FindOrderItemByOrderIdGateway
{
    private OrderItemRepository $repository;

    function  __construct(OrderItemRepository $repository)
    {
        $this->$repository =  $repository;
    }

    /**
     * @return OrderItem[]|null
     */
    function find(int $orderId): ?array
    {
        return $this->repository->findByOrderId($orderId);
    }
}
