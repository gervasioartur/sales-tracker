<?php

namespace App\application\usecase\order;

use App\application\gateway\order\CreateOrderGateway;
use App\domain\entity\Order;
use App\domain\entity\OrderItem;
use App\domain\model\CreateOrderParams;

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
