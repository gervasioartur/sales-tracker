<?php

namespace App\domain\entity;

class OrderItem
{
    private int $id;
    private int $orderId;
    private int $productId;
    private float $amount;
    private float $unitPrice;
    private float $subTotal;

    public function __construct(int $orderId, int $productId, float $amount)
    {
        $this->orderId = $orderId;
        $this->productId = $productId;
        $this->amount = $amount;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(float $unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }

    public function getSubTotal(): float
    {
        return $this->subTotal;
    }

    public function setSubTotal(float $subTotal): void
    {
        $this->subTotal = $subTotal;
    }

}
