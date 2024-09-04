<?php

namespace App\application\gateway\order;

use App\domain\entity\Installment;

interface CreateInstallmentGateway
{
    function create(Installment $installment): Installment;
}
