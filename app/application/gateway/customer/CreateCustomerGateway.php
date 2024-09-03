<?php

namespace App\application\gateway\customer;

use App\domain\entity\Customer;
use App\domain\entity\CustomerEntity;

interface CreateCustomerGateway
{
    function create(Customer $customer): Customer;
}
