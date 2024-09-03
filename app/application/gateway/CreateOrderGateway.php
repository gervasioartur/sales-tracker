<?php

namespace App\application\gateway;

use App\domain\entity\Order;

interface CreateOrderGateway
{
    function create(Order $order): Order;
}
