<?php

namespace App\application\usecase;

use App\application\gateway\FindProductByIdGateway;
use Product;

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
