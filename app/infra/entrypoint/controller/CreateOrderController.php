<?php

namespace App\infra\entrypoint\controller;

use App\application\usecase\customer\ListCustomers;
use App\application\usecase\order\CreateOrder;
use App\application\usecase\product\ListProducts;
use App\infra\mapper\OrderMapper;
use Exception;
use Illuminate\Http\Request;


class CreateOrderController extends BaseController
{
    private CreateOrder $usecase;
    private OrderMapper $mapper;
    private ListCustomers $listCustomers;
    private ListProducts $listProducts;


    public function __construct(CreateOrder   $usecase,
                                ListCustomers $listCustomers,
                                ListProducts  $listProducts,
                                OrderMapper   $mapper)
    {
        $this->usecase = $usecase;
        $this->mapper = $mapper;
        $this->listCustomers = $listCustomers;
        $this->listProducts = $listProducts;
    }

    public function index()
    {
        $customers = $this->listCustomers->list();
        $products = $this->listProducts->list();
        return view('order.create', ['customers' => $customers, 'products' => $products]);
    }

    function perform(Request $request)
    {
        try {
            $createOrderParams = $this->mapper->fromRequest($request);
            $this->usecase->create($createOrderParams);
            $customers = $this->listCustomers->list();
            $products = $this->listProducts->list();
            return view('order.create', ['success' => 'Created', 'customers' => $customers, 'products' => $products]);
        } catch (Exception $ex) {
            return view('order.create')->with('error', $ex->getMessage());
        }
    }
}
