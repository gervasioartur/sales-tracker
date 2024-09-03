<?php

namespace App\application\gateway;

use Order;
use OrderItem;

interface FindOrderItemByOrderIdGateway
{
               /**
 * @return OrderItem[]|null
 */
    function find(int $orderId): ?array;
}
