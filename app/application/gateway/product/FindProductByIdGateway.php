<?php

namespace App\application\gateway\product;


use App\domain\entity\Product;

interface FindProductByIdGateway
{

    function find(int $productId): ?Product;
}
