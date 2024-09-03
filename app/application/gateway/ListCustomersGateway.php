<?php

namespace App\application\gateway;

use App\domain\entity\Customer;

interface ListCustomersGateway
{
       /**
 * @return Customer[]|null
 */
    function list(): ?array;
}
