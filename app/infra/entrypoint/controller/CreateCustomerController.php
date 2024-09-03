<?php

namespace App\infra\entrypoint\controller;

use App\application\usecase\CreateCustomer;
use App\domain\entity\CustomerEntity;
use App\infra\mapper\CustomerMapper;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;


class CreateCustomerController extends BaseController
{
    private CreateCustomer $usecase;
    private CustomerMapper $mapper;

    public function __construct(CreateCustomer $usecase, CustomerMapper $mapper)
    {
        $this->usecase = $usecase;
        $this->mapper = $mapper;
    }

    function perform(Request $request)
    {
        try {
            $customerEntity = new CustomerEntity(
                $request->input('name'),
                $request->input('email'),
                $request->input('phone')
            );

            Debugbar::info("render");
            $this->usecase->create($customerEntity);
            return redirect()->back()->with('success', 'User successfully created.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
