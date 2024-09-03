<?php

namespace App\infra\persistence\repository\impl;

use App\domain\entity\Product;
use App\infra\mapper\ProductMapper;
use App\infra\persistence\repository\contract\ProductRepository;
use Illuminate\Support\Facades\DB;

class ProductRepositoryImpl implements ProductRepository
{
    private ProductMapper $mapper;

    public function __construct(ProductMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    function create(array $data): Product
    {
        $id = DB::table("t_products")->insertGetId($data);
        $data['id'] = $id;
        return $this->mapper->fromArray($data);
    }

    function find(int $productId): ?Product
    {
        $product = DB::table('t_products')->where('id', $productId)->get();
        return $this->mapper->formObj($product);
    }
}
