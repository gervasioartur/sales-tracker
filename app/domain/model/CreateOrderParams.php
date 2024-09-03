<?php

namespace App\domain\model;

class CreateOrderParams

{
    private int $customerId;
    private string $paymentMethod;
    /**
     * @var CreateOrderItemsParams[] $orderItems
     */
    private array $orderItems;

    /**
     * @param CreateOrderItemsParams[] $orderItems
     */
    public function __construct(
        int    $customerId,
        string $paymentMethod,
    )
    {
        $this->customerId = $customerId;
        $this->paymentMethod = $paymentMethod;
    }

    public function getCustomerId()
    {
        return $this->customerId;
    }

    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return CreateOrderItemsParams[]
     */
    public function getOrderItems(): array
    {
        return $this->orderItems;
    }

    /**
     * @param CreateOrderItemsParams[] $orderItems
     */
    public function setOrderItems(array $orderItems): void
    {
        foreach ($orderItems as $item) {
            if (!$item instanceof CreateOrderItemsParams) {
                throw new \InvalidArgumentException("Each item must be an instance of CreateOrderItemsParams");
            }
        }
        $this->orderItems = $orderItems;
    }
}
