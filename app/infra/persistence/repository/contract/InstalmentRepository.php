<?php

namespace App\infra\persistence\repository\contract;


use App\domain\entity\Installment;

interface InstalmentRepository
{
    function create(array $data): Installment;
}
