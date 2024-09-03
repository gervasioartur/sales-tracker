<?php

namespace App\application\gateway\customer;

use App\domain\entity\Customer;

interface ListCustomersGateway
{
       /**
 * @return Customer[]|null
 */
    function list(): ?array;
}
