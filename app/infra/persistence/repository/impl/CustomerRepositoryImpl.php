<?php

namespace App\infra\persistence\repository\impl;

use App\domain\entity\Customer;
use App\infra\mapper\CustomerMapper;
use App\infra\persistence\repository\contract\CustomerRepository;
use Illuminate\Support\Facades\DB;

class CustomerRepositoryImpl implements CustomerRepository
{
    private CustomerMapper $mapper;

    public function __construct(CustomerMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    function create(array $data): Customer
    {
        $id = DB::table("t_customers")->insertGetId($data);
        $data['id'] = $id;
        return $this->mapper->fromArray($data);
    }

    function findByEmail(string $email): ?Customer
    {
        $customer = DB::table('t_customers')->where('email', $email)->first();
        if ($customer) return $this->mapper->formObj($customer);
        return null;
    }

    function list(): ?array
    {
        $customers = DB::table('t_customers')->get();
        return $customers?->map(fn($customer) => $this->mapper->formObj($customer))->toArray();
    }
}
