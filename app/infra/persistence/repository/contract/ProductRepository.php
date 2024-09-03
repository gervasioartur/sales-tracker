<?php

namespace App\infra\persistence\repository\contract;


use App\domain\entity\Product;

interface ProductRepository
{
    function create(array $data): Product;

    function find(int $productId): ?Product;

    /**
     * @return Product[]|null
     */
    function list(): ?array;

}
