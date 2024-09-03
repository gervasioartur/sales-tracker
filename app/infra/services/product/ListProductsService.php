<?php

namespace App\infra\services\product;

use App\application\gateway\customer\ListProductsGateway;
use App\domain\entity\Product;
use App\infra\persistence\repository\contract\ProductRepository;

class ListProductsService implements ListProductsGateway
{
    private ProductRepository $repository;

    function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return Product[]|null
     */
    function list(): ?array
    {
        return $this->repository->list();
    }
}
