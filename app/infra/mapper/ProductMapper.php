<?php

namespace App\infra\mapper;


use App\domain\entity\Product;
use Illuminate\Http\Request;

class ProductMapper
{
    public function fromArray(array $data): Product
    {
        $product = new Product($data['name'], $data['desc'], $data['price']);
        $product->setId($data['id']);
        return $product;
    }

    public function formEntity(Product $product): array
    {
        return [
            'name' => $product->getName(),
            'desc' => $product->getDesc(),
            'price' => $product->getPrice(),
        ];
    }

    public function formObj(object $product): Product
    {
        $productEntity = new Product($product->name, $product->desc, $product->price);
        $productEntity->setId($product->id);
        return $productEntity;
    }

    public function formRequest(Request $request): Product
    {
        $product = new Product(
            $request->input('name'),
            $request->input('desc'),
            $request->input('price')
        );
        return $product;
    }
}
