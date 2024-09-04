<?php

namespace App\application\usecase\order;

use App\application\gateway\order\ListOrdersGateway;
use App\domain\model\OrderModel;

class ListOrders
{
    private ListOrdersGateway $gateway;

    function __construct(ListOrdersGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * @return OrderModel[]|null
     */
    function list() : array
    {
        return $this->gateway->list();
    }
}
