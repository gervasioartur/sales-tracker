<?php

namespace App\infra\services\product;

use App\application\gateway\product\FindProductByIdGateway;
use App\domain\entity\Product;
use App\infra\persistence\repository\contract\ProductRepository;

class FindProductByIdService implements FindProductByIdGateway
{

    private ProductRepository $repository;
    function __construct(ProductRepository $repository)
    {
        $this->repository= $repository;
    }

    function find(int $productId): ?Product
    {
        return $this->repository->find($productId);
    }
}
