<?php

namespace App\infra\persistence\repository\contract;


use App\domain\entity\Order;

interface OrderRepository
{
    function create(array $data): Order;
    function list(): ?array;
    function update(Order $order): void;
}
