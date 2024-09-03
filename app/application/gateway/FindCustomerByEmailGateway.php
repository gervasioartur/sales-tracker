<?php

namespace App\application\gateway;

use App\domain\entity\Customer;

interface FindCustomerByEmailGateway
{
    function find(string $email): ?Customer;
}
