<?php

namespace App\infra\persistence\repository\contract;


use App\domain\entity\OrderItem;

interface OrderItemRepository
{
    function create(array $data): OrderItem;

    /**
     * @return OrderItem[]|null
     */
    function findByOrderId(int $orderId): ?array;

}
