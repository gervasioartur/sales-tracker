<?php

namespace App\application\gateway\order;


use App\domain\entity\OrderItem;

interface CreateOrderItemGateway
{
    function create(OrderItem $orderItem): OrderItem;
}
