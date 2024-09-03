<?php

namespace App\application\usecase\order;

use App\application\gateway\order\FindOrderItemByOrderIdGateway;
use App\domain\entity\OrderItem;

class FindOrderItemByOrderId
{
    private FindOrderItemByOrderIdGateway $gateway;

    public function __construct(FindOrderItemByOrderIdGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * @return OrderItem[]|null
     */
    function find(int $orderId): ?array
    {
        return $this->gateway->find($orderId);
    }
}
