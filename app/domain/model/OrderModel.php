<?php

namespace App\domain\model;

class OrderModel
{
    private int $id;
    private string $customerName;
    private \DateTime $orderDate;
    private string $paymentMethod;
    private string $paymentType;
    private float $total;

    public function __construct(
        int $id,
        string $customerName,
        \DateTime $orderDate,
        string $paymentMethod,
        string $paymentType,
        float $total
    ) {
        $this->id = $id;
        $this->customerName = $customerName;
        $this->orderDate = $orderDate;
        $this->paymentMethod = $paymentMethod;
        $this->paymentType = $paymentType;
        $this->total = $total;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCustomerName(): string
    {
        return $this->customerName;
    }

    public function getOrderDate(): \DateTime
    {
        return $this->orderDate;
    }

    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    public function getPaymentType(): string
    {
        return $this->paymentType;
    }

    public function getTotal(): float
    {
        return $this->total;
    }
}
