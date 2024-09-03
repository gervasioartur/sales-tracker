<?php

namespace App\application\gateway\order;

use App\domain\entity\Order;

interface CreateOrderGateway
{
    function create(Order $order): Order;
}
