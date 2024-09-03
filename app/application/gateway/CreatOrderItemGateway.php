<?php

namespace App\application\gateway;

use OrderItem;

interface CreateOrderItemGateway
{
    function create(OrderItem $orderItem): OrderItem;
}
