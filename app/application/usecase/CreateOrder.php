<?php

namespace App\application\usecase;

use App\application\gateway\CreateOrderGateway;
use CreateOrderParams;
use DateTime;
use Order;
use OrderItem;

class CreateOrder
{
    private CreateOrderGateway $gateway;
    private CreateOrderItem $createOrderItem;

    public function __construct(CreateOrderGateway $gateway, CreateOrderItem $createOrderItem)
    {
        $this->gateway = $gateway;
        $this->createOrderItem = $createOrderItem;
    }

    function create(CreateOrderParams $params): Order
    {
        $total = 0;
        $order = new Order($params->getCustomerId(), new DateTime(), $params->getPaymentMethod());
        $order = $this->gateway->create($order);

        foreach ($params->getOrderItems() as $orderItemData) {
            $orderItem = new OrderItem($order->getId(), $orderItemData->getProductId(), $orderItemData->getAmount());
            $orderItem = $this->createOrderItem->create($orderItem);
            $total += $orderItem->getSubTotal();
        }

        $order->setTotal($total);
        return $order;
    }
}
