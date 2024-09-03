<?php

namespace App\infra\mapper;

use App\domain\entity\CustomerEntity;
use App\infra\persistence\model\Customer;

class CustomerMapper
{
    public function toEntity(array $model)
    {
        return new CustomerEntity(
            $model->name,
            $model->email,
            $model->phone,
            $model->id,
        );
    }

    public function toModel(CustomerEntity $entity)
    {
        $model = new Customer();
        $model->name = $entity->getName();
        $model->email = $entity->getEmail();
        $model->phone = $entity->getPhone();
        $model->id = $entity->getId();
        return $model;
    }
}
