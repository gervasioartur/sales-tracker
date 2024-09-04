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
     * @var CreateInstallmentParams[] $installments
     */
    private array $installments;

    public function __construct(int $customerId, string $paymentMethod)
    {
        $this->customerId = $customerId;
        $this->paymentMethod = $paymentMethod;
    }

    // Getter e Setter para customerId
    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    public function setCustomerId(int $customerId): void
    {
        $this->customerId = $customerId;
    }

    // Getter e Setter para paymentMethod
    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(string $paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }

    // Getter e Setter para orderItems
    public function getOrderItems(): array
    {
        return $this->orderItems;
    }

    public function setOrderItems(array $orderItems): void
    {
        $this->orderItems = $orderItems;
    }

    // Getter e Setter para installments
    public function getInstallments(): array
    {
        return $this->installments;
    }

    public function setInstallments(array $installments): void
    {
        $this->installments = $installments;
    }
}
