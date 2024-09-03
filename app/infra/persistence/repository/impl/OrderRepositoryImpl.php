<?php

namespace App\infra\persistence\repository\impl;

use App\domain\entity\Order;
use App\infra\mapper\OrderMapper;
use App\infra\persistence\repository\contract\OrderRepository;
use Illuminate\Support\Facades\DB;

class OrderRepositoryImpl implements OrderRepository
{
    private OrderMapper $mapper;

    public function __construct(OrderMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    function create(array $data): Order
    {
        $id = DB::table("t_orders")->insertGetId($data);
        $data['id'] = $id;
        return $this->mapper->fromArray($data);
    }

    function update(Order $order): void
    {
        DB::table('t_orders')
            ->where('id', $order->getId())
            ->update([
                'order_date' => $order->getOrderDate(),
                'payment_method' => $order->getPaymentMethod(),
                'total' => $order->getTotal(),
            ]);
    }
}
