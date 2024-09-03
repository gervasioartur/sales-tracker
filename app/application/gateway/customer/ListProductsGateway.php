<?php

namespace App\application\gateway\customer;

use App\domain\entity\Product;

interface ListProductsGateway
{
    /**
     * @return Product[]|null
     */
    function list(): ?array;
}
