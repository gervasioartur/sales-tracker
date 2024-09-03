<?php

namespace App\infra\mapper;

use App\domain\entity\Customer;
use Illuminate\Http\Request;

class CustomerMapper
{
    public function fromArray(array $data)
    {
        return new Customer($data['id'], $data['name'], $data['email'], $data['phone']);
    }

    public function formObj(object $customer)
    {
        $customerEntity = new Customer($customer->name, $customer->email, $customer->phone);
        $customerEntity->setId($customer->id);
        return $customerEntity;;
    }

    public function formEntity(Customer $customer)
    {
        return [
            'id' => $customer->getId(),
            'name' => $customer->getName(),
            'email' => $customer->getEmail(),
            'phone' => $customer->getPhone(),
        ];
    }

    public function formRequest(Request $request)
    {
        return new Customer(
            $request->input('name'),
            $request->input('email'),
            $request->input('phone')
        );
    }
}
