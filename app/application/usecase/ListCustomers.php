<?php

namespace App\application\usecase;

use App\application\gateway\ListCustomersGateway;

class ListCustomers
{
    private ListCustomersGateway $gateway;

    public function __construct(ListCustomersGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    function list(): ?array
    {
        return $this->gateway->list();
    }
}
