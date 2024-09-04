<?php

namespace App\domain\entity;

namespace App\domain\entity;

class Installment
{
    private int $id;
    private int $orderId;
    private float $amount;
    private \DateTime $dueDate;

    // Construtor
    public function __construct(int $orderId, float $amount, \DateTime $dueDate)
    {
        $this->orderId = $orderId;
        $this->amount = $amount;
        $this->dueDate = $dueDate;
    }

    // Getter e Setter para id
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    // Getter e Setter para orderId
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
    }

    // Getter e Setter para amount
    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    // Getter e Setter para dueDate
    public function getDueDate(): \DateTime
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTime $dueDate): void
    {
        $this->dueDate = $dueDate;
    }
}
