<?php

namespace App\application\gateway\order;

use App\domain\entity\Order;

interface UpdateOrderGateway
{
    function update(Order $order): void;
}
