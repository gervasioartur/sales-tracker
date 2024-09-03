<?php

namespace App\infra\mapper;


use App\domain\entity\OrderItem;

class OrderItemMapper
{
    public function fromArray(array $data): OrderItem
    {
        $orderItem = new OrderItem($data['order_id'], $data['product_id'], $data['amount']);
        $orderItem->setId($data['id']);
        $orderItem->setUnitPrice($data['unit_price']);
        $orderItem->setSubTotal($data['sub_total']);
        return $orderItem;
    }

    public function formEntity(OrderItem $orderItem): array
    {
        return [
            'order_id' => $orderItem->getOrderId(),
            'product_id' => $orderItem->getProductId(),
            'amount' => $orderItem->getAmount(),
            'unit_price' => $orderItem->getUnitPrice(),
            'sub_total' => $orderItem->getSubTotal(),
        ];
    }

    public function formObj(object $orderItem): OrderItem
    {
        $orderItemEntity = new OrderItem($orderItem->id, $orderItem->product_id, $orderItem->amount);
        $orderItemEntity->setId($orderItem->id);
        $orderItemEntity->setUnitPrice($orderItem->unit_price);
        $orderItemEntity->setSubTotal($orderItem->sub_total);
        return $orderItemEntity;
    }
}
