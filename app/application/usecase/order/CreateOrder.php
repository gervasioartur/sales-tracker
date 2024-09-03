<?php

namespace App\application\usecase\order;

use App\application\gateway\order\CreateOrderGateway;
use App\application\gateway\order\UpdateOrderGateway;
use App\domain\entity\Order;
use App\domain\entity\OrderItem;
use App\domain\model\CreateOrderParams;

class CreateOrder
{
    private CreateOrderGateway $gateway;
    private CreateOrderItem $createOrderItem;
    private UpdateOrderGateway $updateOrder;

    public function __construct(CreateOrderGateway $gateway,
                                CreateOrderItem $createOrderItem,
                                UpdateOrder $updateOrder)
    {
        $this->gateway = $gateway;
        $this->createOrderItem = $createOrderItem;
        $this->updateOrder=$updateOrder;

    }

    function create(CreateOrderParams $params): Order
    {
        $total = 0;
        $order = new Order($params->getCustomerId(), new \DateTime(), $params->getPaymentMethod());
        $order = $this->gateway->create($order);

        foreach ($params->getOrderItems() as $orderItemData) {
            $orderItem = new OrderItem($order->getId(), $orderItemData->getProductId(), $orderItemData->getAmount());
            $orderItem = $this->createOrderItem->create($orderItem);
            $total += $orderItem->getSubTotal();
        }

        $order->setTotal($total);
        $this->updateOrder->update($order);
        return $order;
    }
}
