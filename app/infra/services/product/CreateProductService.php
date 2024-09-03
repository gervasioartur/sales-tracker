<?php

namespace App\infra\services\product;

use App\application\gateway\product\CreateProductGateway;
use App\domain\entity\Product;
use App\infra\mapper\ProductMapper;
use App\infra\persistence\repository\contract\ProductRepository;

class CreateProductService implements CreateProductGateway
{
    private ProductRepository $repository;
    private ProductMapper $mapper;

    function __construct(ProductRepository $repository, ProductMapper $mapper)
    {
        $this->repository = $repository;
        $this->mapper = $mapper;
    }

    function create(Product $product): Product
    {
        $data = $this->mapper->formEntity($product);
        return $this->repository->create($data);
    }
}
