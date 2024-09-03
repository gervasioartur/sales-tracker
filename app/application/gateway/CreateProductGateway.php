<?php

namespace App\application\gateway;


use App\domain\entity\Product;

interface CreateProductGateway
{

    function create(Product $product): Product;
}
