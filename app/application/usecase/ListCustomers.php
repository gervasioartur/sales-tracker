<?php

namespace App\application\usecase;

use App\application\gateway\ListCustomersGateway;
use App\domain\entity\Customer;

class ListCustomers
{
    private ListCustomersGateway $gateway;

    public function __construct(ListCustomersGateway $gateway)
    {
        $this->gateway = $gateway;
    }

   /**
 * @return Customer[]|null
 */
public function list(): ?array
{
    return $this->gateway->list();
}
}
