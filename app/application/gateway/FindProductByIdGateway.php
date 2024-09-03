<?php

namespace App\application\gateway;


use App\domain\entity\Product;

interface FindProductByIdGateway
{

    function find(int $productId): ?Product;
}
