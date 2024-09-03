<?php

namespace App\infra\mapper;


use App\domain\entity\Order;

class OrderMapper
{
    public function fromArray(array $data) : Order
    {
        $order = new Order($data['$customer_id'], $data['$order_date'], $data['$paymentMethod']);
        $order->setId($data['id']);
        $order->setTotal($data['total']);
        return $order;
    }
}
