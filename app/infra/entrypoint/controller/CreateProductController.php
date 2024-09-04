<?php

namespace App\infra\entrypoint\controller;

use App\application\usecase\product\CreateProduct;
use App\application\usecase\product\ListProducts;
use App\infra\mapper\ProductMapper;
use Exception;
use Illuminate\Http\Request;


class CreateProductController extends BaseController
{
    private CreateProduct $usecase;
    private ProductMapper $mapper;
    private ListProducts $listProducts;


    public function __construct(CreateProduct $usecase,ListProducts  $listProducts, ProductMapper $mapper)
    {
        $this->usecase = $usecase;
        $this->mapper = $mapper;
        $this->listProducts = $listProducts;
    }

    public function index()
    {
        $products = $this->listProducts->list();
        return view('product.create', ['products' => $products]);
    }

    function perform(Request $request)
    {
        try {
            $product = $this->mapper->formRequest($request);
            $this->usecase->create($product);
            $products = $this->listProducts->list();
            return view('product.create', ['success' => 'Created','products' => $products]);
        } catch (Exception $ex) {
            return view('product.create')->with('error', $ex->getMessage());
        }
    }
}
