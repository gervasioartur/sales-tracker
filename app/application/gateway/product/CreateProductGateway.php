<?php

namespace App\application\gateway\product;


use App\domain\entity\Product;

interface CreateProductGateway
{

    function create(Product $product): Product;
}
