<?php

namespace App\application\usecase\order;

use App\application\gateway\order\UpdateOrderGateway;
use App\domain\entity\Order;

class UpdateOrder
{
    private UpdateOrderGateway $gateway;

    function __construct(UpdateOrderGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    function update(Order $order)
    {
        $this->gateway->update($order);
    }
}
