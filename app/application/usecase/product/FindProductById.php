<?php

namespace App\application\usecase\product;

use App\application\gateway\product\FindProductByIdGateway;
use App\domain\entity\Product;

class FindProductById
{
    private FindProductByIdGateway $gateway;

    public function __construct(FindProductByIdGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    function find(int $productId): ?Product
    {
        return $this->gateway->find($productId);
    }
}
