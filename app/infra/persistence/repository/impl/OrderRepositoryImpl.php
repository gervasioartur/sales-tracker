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

    function list(): ?array
    {
        $orders = DB::table('t_orders')
            ->join('t_customers', 't_orders.customer_id', '=', 't_customers.id')
            ->leftJoin('t_installments', 't_orders.id', '=', 't_installments.order_id')
            ->select(
                't_orders.id as id',
                't_customers.name as customer_name',
                't_orders.order_date as order_date',
                't_orders.payment_method as payment_method',
                DB::raw('IF(COUNT(t_installments.id) > 1, "Parcelado", "A Vista") as payment_type'),
                't_orders.total as total'
            )
            ->groupBy('t_orders.id', 't_customers.name', 't_orders.order_date', 't_orders.payment_method', 't_orders.total')
            ->get();


        return $orders?->map(fn($order) => $this->mapper->toOrderModel($order))->toArray();
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
