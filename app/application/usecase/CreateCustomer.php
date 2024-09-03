<?php

namespace App\application\usecase;

use App\application\gateway\CreateCustomerGateway;
use App\domain\entity\CustomerEntity;
use App\domain\exception\ConflictException;
use Illuminate\Support\Facades\Log;


class CreateCustomer
{
    private FindCustomerByEmail $findCustomerByEmail;
    private CreateCustomerGateway $gateway;

    public function __construct(FindCustomerByEmail $findCustomerByEmail, CreateCustomerGateway $gateway)
    {
        $this->findCustomerByEmail = $findCustomerByEmail;
        $this->gateway = $gateway;
    }

    public function create(CustomerEntity $customer): void
    {
        Log::channel('stderr')->info('Something happened!');
        $result = $this->findCustomerByEmail->find($customer->getEmail());
        if ($result !== null) {
            throw new ConflictException("User already exists");
        }
        $this->gateway->create($customer);
    }
}
