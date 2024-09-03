<?php

namespace App\application\usecase\customer;

use App\application\gateway\customer\CreateCustomerGateway;
use App\domain\entity\Customer;

class CreateCustomer
{
    private FindCustomerByEmail $findCustomerByEmail;
    private CreateCustomerGateway $gateway;

    public function __construct(FindCustomerByEmail $findCustomerByEmail, CreateCustomerGateway $gateway)
    {
        $this->findCustomerByEmail = $findCustomerByEmail;
        $this->gateway = $gateway;
    }

    public function create(Customer $customer): void
    {
        $result = $this->findCustomerByEmail->find($customer->getEmail());
        if ($result !== null) throw new \Exception("User already exists");
        $this->gateway->create($customer);
    }
}
