<?php

namespace App\domain\model;

class CreateInstallmentParams
{
    private int $value;
    private \DateTime $dueDate;

    public function __construct(int $value, \DateTime $dueDate)
    {
        $this->value = $value;
        $this->dueDate = $dueDate;
    }

    // Setter para $value

    public function getValue(): float
    {
        return $this->value;
    }

    public function setValue(int $value): void
    {
        $this->value = $value;
    }

    // Getter para $dueDate

    public function getDueDate(): \DateTime
    {
        return $this->dueDate;
    }

    // Setter para $dueDate
    public function setDueDate(\DateTime $dueDate): void
    {
        $this->dueDate = $dueDate;
    }
}
