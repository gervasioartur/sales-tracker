<?php
class CreateOrderItemsParams {
    private int $customerId;
    private int $productId;
    private float $amount;

    public function __construct(int $customerId, int $productId, float $amount)
    {
        $this->customerId = $customerId;
        $this->productId = $productId;
        $this->amount = $amount;
    }

    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    public function setCustomerId(int $customerId): void
    {
        $this->customerId = $customerId;
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
}
