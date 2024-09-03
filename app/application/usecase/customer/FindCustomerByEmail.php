<?php

namespace App\application\usecase\customer;

use App\application\gateway\customer\FindCustomerByEmailGateway;
use App\domain\entity\Customer;

class FindCustomerByEmail
{
    private FindCustomerByEmailGateway $gateway;

    public function __construct(FindCustomerByEmailGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    function find(string $email): ?Customer
    {
        return $this->gateway->find($email);
    }
}
