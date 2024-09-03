<?php

namespace App\application\gateway\customer;

use App\domain\entity\Customer;

interface FindCustomerByEmailGateway
{
    function find(string $email): ?Customer;
}
