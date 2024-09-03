<?php

namespace App\application\usecase\product;

use App\application\gateway\customer\ListProductsGateway;
use App\domain\entity\Product;

class ListProducts
{
    private ListProductsGateway $gateway;

    public function __construct(ListProductsGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * @return Product[]|null
     */
    function list(): array
    {
        return $this->gateway->list();
    }
}

