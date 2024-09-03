<?php

namespace App\application\usecase;

use App\application\gateway\CreateProductGateway;
use App\domain\entity\Product;


class CreateProduct
{
    private CreateProductGateway $gateway;

    public function __construct(CreateProductGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    function create(Product $product): Product
    {
        return $this->gateway->create($product);
    }
}
