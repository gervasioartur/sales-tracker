<?php

namespace App\infra\persistence\repository\impl;

use App\domain\entity\Installment;
use App\infra\mapper\InstalmentMapper;
use App\infra\persistence\repository\contract\InstalmentRepository;
use Illuminate\Support\Facades\DB;

class InstalmentRepositoryImpl implements InstalmentRepository
{
    private InstalmentMapper $mapper;

    function __construct(InstalmentMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    function create(array $data): Installment
    {
        $id = DB::table("t_installments")->insertGetId($data);
        return $this->mapper->fromArray($data);
    }
}
