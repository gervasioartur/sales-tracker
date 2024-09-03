<?php

namespace App\application\gateway\order;


use App\domain\entity\OrderItem;

interface FindOrderItemByOrderIdGateway
{
               /**
 * @return OrderItem[]|null
 */
    function find(int $orderId): ?array;
}
