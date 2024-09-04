<?php

namespace App\infra\entrypoint\controller;

use App\application\usecase\customer\CreateCustomer;
use App\application\usecase\customer\ListCustomers;
use App\infra\mapper\CustomerMapper;
use Exception;
use Illuminate\Http\Request;


class CreateCustomerController extends BaseController
{
    private CreateCustomer $usecase;
    private CustomerMapper $mapper;
    private ListCustomers $listCustomers;

    public function __construct(CreateCustomer $usecase, ListCustomers $listCustomers, CustomerMapper $mapper)
    {
        $this->usecase = $usecase;
        $this->mapper = $mapper;
        $this->listCustomers = $listCustomers;
    }

    public function index()
    {
        $customers = $this->listCustomers->list();
        return view('customer.create', ['customers' => $customers]);
    }

    function perform(Request $request)
    {
        try {
            $customer = $this->mapper->formRequest($request);
            $this->usecase->create($customer);
            $customers = $this->listCustomers->list();
            return view('customer.create', ['success' => 'Created', 'customers' => $customers]);
        } catch (Exception $ex) {
            return view('customer.create')->with('error', $ex->getMessage());
        }
    }
}
