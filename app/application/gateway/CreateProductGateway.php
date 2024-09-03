<?php

namespace App\application\gateway;

use Product;

interface CreateProductGateway
{

    function create(Product $product): Product;
}
