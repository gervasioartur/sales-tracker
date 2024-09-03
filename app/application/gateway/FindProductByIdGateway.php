<?php

namespace App\application\gateway;

use Product;

interface FindProductByIdGateway
{

    function find(int $productId): ?Product;
}
