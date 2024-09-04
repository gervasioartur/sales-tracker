<?php

namespace App\infra\mapper;


use App\domain\entity\Installment;

class InstalmentMapper
{
    public function fromArray(array $data): Installment
    {
        $installment = new Installment($data['order_id'], $data['amount'], $data['due_date']);
        return $installment;
    }

    public function fromEntity(Installment $installment): array
    {
        return [
            'order_id' => $installment->getOrderId(),
            'amount' => $installment->getAmount(),
            'due_date' => $installment->getDueDate(),
        ];
    }
}
