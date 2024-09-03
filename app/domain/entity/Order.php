<?php
namespace App\domain\entity;

class Order {
    private int $id;
    private int $customerId;
    private DateTime $orderDate;
    private string $paymentMethod;
    private float $total;

    public function __construct(int $customerId,DateTime $orderDate, string $paymentMethod)
    {
        $this->customerId = $customerId;
        $this->orderDate = $orderDate;
        $this->paymentMethod = $paymentMethod;
    }

    public function getId():int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getCustomerId() :string
    {
        return $this->customerId;
    }

    public function setCustomerId(string $customerId)
    {
        $this->customerId = $customerId;
    }

    public function getOrderDate(): DateTime
    {
        return $this->orderDate;
    }

    public function setOrderDate(DateTime $orderDate)
    {
        $this->orderDate = $orderDate;
    }

    public function getPaymentMethod() : string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(string $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function setTotal(float $total)
    {
        $this->total = $total;
    }
}
