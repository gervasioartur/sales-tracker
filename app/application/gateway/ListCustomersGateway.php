<?php

namespace App\application\gateway;

interface ListCustomersGateway
{
       /**
 * @return Customer[]|null
 */
    function list(): ?array;
}
