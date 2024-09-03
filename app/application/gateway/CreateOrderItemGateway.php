<?php

namespace App\application\gateway;


use App\domain\entity\OrderItem;

interface CreateOrderItemGateway
{
    function create(OrderItem $orderItem): OrderItem;
}
