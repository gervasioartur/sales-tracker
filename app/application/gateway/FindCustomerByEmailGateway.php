<?php

namespace App\application\gateway;

use App\domain\entity\CustomerEntity;

interface FindCustomerByEmailGateway
{
    function find(string $email): ?CustomerEntity;
}
