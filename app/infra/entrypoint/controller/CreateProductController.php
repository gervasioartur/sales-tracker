<?php

namespace App\infra\entrypoint\controller;

use App\application\usecase\product\CreateProduct;
use App\infra\mapper\ProductMapper;
use Exception;
use Illuminate\Http\Request;


class CreateProductController extends BaseController
{
    private CreateProduct $usecase;
    private ProductMapper $mapper;

    public function __construct(CreateProduct $usecase, ProductMapper $mapper)
    {
        $this->usecase = $usecase;
        $this->mapper = $mapper;
    }

    function perform(Request $request)
    {
        try {
            $product = $this->mapper->formRequest($request);
            $this->usecase->create($product);
            return view('product.create')->with('success', 'created');
        } catch (Exception $ex) {
            return view('product.create')->with('error', $ex->getMessage());
        }
    }
}
