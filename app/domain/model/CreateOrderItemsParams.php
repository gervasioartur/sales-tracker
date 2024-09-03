<?php

namespace App\domain\model;

class CreateOrderItemsParams
{
    private int $productId;
    private int $amount;

    public function __construct(int $productId, int $amount)
    {
        $this->productId = $productId;
        $this->amount = $amount;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }
}
