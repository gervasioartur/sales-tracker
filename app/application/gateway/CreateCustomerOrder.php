<?php

namespace App\application\gateway;

use Order;

interface CreateOrderGateway
{
    function create(Order $order): Order;
}
