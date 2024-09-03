<?php

namespace App\application\gateway;

use App\domain\entity\Customer;
use App\domain\entity\CustomerEntity;

interface CreateCustomerGateway
{
    function create(Customer $customer): Customer;
}
