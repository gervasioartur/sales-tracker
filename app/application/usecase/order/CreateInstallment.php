<?php

namespace App\application\usecase\order;

use App\application\gateway\order\CreateInstallmentGateway;
use App\domain\entity\Installment;

class CreateInstallment
{
    private CreateInstallmentGateway $gateway;

    public function __construct(CreateInstallmentGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    function create(Installment $params): Installment
    {
        return $this->gateway->create($params);
    }
}
