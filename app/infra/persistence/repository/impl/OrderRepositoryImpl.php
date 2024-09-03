<?php

namespace App\infra\persistence\repository\impl;

use App\domain\entity\Customer;
use App\domain\entity\Order;
use App\domain\entity\OrderItem;
use App\infra\mapper\CustomerMapper;
use App\infra\mapper\OrderMapper;
use App\infra\persistence\repository\contract\CustomerRepository;
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
        DB::table('orders')
            ->where('id', $order->getId())
            ->update([
                'orderDate' => $order->getOrderDate(),
                'paymentMethod' => $order->getPaymentMethod(),
                'total' => $order->getTotal(),
            ]);
    }
}
