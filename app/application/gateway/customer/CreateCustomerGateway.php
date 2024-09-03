<?php

namespace App\application\gateway\customer;

use App\domain\entity\Customer;

interface CreateCustomerGateway
{
    function create(Customer $customer): Customer;
}
