<?php

namespace App\application\gateway;

use App\domain\entity\CustomerEntity;

interface CreateCustomerGateway
{
    function create(CustomerEntity $customer): void;
}
