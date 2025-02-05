<?php

namespace App\application\usecase\order;

use App\application\gateway\order\CreateOrderGateway;
use App\domain\entity\Installment;
use App\domain\entity\Order;
use App\domain\entity\OrderItem;
use App\domain\model\CreateOrderParams;

class CreateOrder
{
    private CreateOrderGateway $gateway;
    private CreateOrderItem $createOrderItem;
    private CreateInstallment $createInstallment;
    private UpdateOrder $updateOrder;

    public function __construct(CreateOrderGateway $gateway,
                                CreateOrderItem    $createOrderItem,
                                CreateInstallment  $createInstallment,
                                UpdateOrder        $updateOrder)
    {
        $this->gateway = $gateway;
        $this->createOrderItem = $createOrderItem;
        $this->createInstallment = $createInstallment;
        $this->updateOrder = $updateOrder;

    }

    function create(CreateOrderParams $params): Order
    {
        $total = 0;
        $order = new Order($params->getCustomerId(), new \DateTime(), $params->getPaymentMethod());
        $order->setTotal($total);
        $order = $this->gateway->create($order);

        foreach ($params->getOrderItems() as $orderItemData) {
            $orderItem = new OrderItem($order->getId(), $orderItemData->getProductId(), $orderItemData->getAmount());
            $orderItem = $this->createOrderItem->create($orderItem);
            $total += $orderItem->getSubTotal();
        }

        foreach ($params->getInstallments() as $installmentData) {
            $installment = new Installment($order->getId(), $installmentData->getValue(), $installmentData->getDueDate());
            $installment = $this->createInstallment->create($installment);
        }

        $order->setTotal($total);
        $this->updateOrder->update($order);
        return $order;
    }
}
