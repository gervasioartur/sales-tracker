<?php

namespace App\application\usecase;

use App\application\gateway\CreateOrderItemGateway;
use OrderItem;

class CreateOrderItem
{
    private CreateOrderItemGateway $gateway;
    private FindOrderItemByOrderId $findOrderItemByOrderId;
    private FindProductById $findProductById;

    public function __construct(
        CreateOrderItemGateway $gateway,
        FindOrderItemByOrderId $findOrderItemByOrderId,
        FindProductById $findProductById
    )
    {
        $this->gateway = $gateway;
        $this->findOrderItemByOrderId =  $findOrderItemByOrderId;
        $this->findProductById =  $findProductById;
    }

    function create(OrderItem $orderItem): OrderItem
    {
        $orderItems = $this->findOrderItemByOrderId->find($orderItem->getOrderId());
        if($orderItem){
            $productIdToCheck = $orderItem->getProductId();
            for ($i = 0; $i < count($orderItems); $i++) {
                if ($orderItems[$i]->getProductId() == $productIdToCheck) {
                    throw new \Exception('Product with code {$productIdToCheck} is already added.');
                }
            }
        }

        $product = $this->findProductById->find($orderItem->getProductId());
        if(!$product) throw new \Exception('Product with code {$productIdToCheck} not found.');
        $orderItem->setSubTotal($product->getPrice()*$orderItem->getAmount());
        $orderItem->setUnitPrice($product->getPrice());
        return $this->gateway->create($orderItem);
    }
}
