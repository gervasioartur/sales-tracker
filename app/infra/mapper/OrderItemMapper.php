<?php

namespace App\infra\mapper;


use App\domain\entity\OrderItem;

class OrderItemMapper
{
    public function fromArray(array $data) : OrderItem
    {
        $orderItem = new OrderItem($data['order_id'], $data['product_id'], $data['amount']);
        $orderItem->setId($data['id']);
        $orderItem->setUnitPrice($data['unit_price']);
        $orderItem->setSubTotal($data['sub_total']);
        return $orderItem;
    }

    public function formObj(object $orderItem) : OrderItem
    {
        $$orderItem = new OrderItem($orderItem->id, $orderItem->product_id, $orderItem->amount);
        $orderItem->setId($orderItem->id);
        $orderItem->setUnitPrice($orderItem->unit_price);
        $orderItem->setSubTotal($orderItem->sub_total);
        return $orderItem;
    }
}
