<?php

namespace App\infra\services\order;

use App\application\gateway\order\CreateInstallmentGateway;
use App\domain\entity\Installment;
use App\infra\mapper\InstalmentMapper;
use App\infra\persistence\repository\contract\InstalmentRepository;

class CreateInstallmentService implements CreateInstallmentGateway
{

    private InstalmentRepository $repository;
    private InstalmentMapper $mapper;

    function __construct(InstalmentRepository $repository, InstalmentMapper $mapper)
    {
        $this->mapper = $mapper;
        $this->repository = $repository;
    }

    function create(Installment $installment): Installment
    {
        $data = $this->mapper->fromEntity($installment);
        return $this->repository->create($data);
    }
}
