<?php

namespace App\infra\persistence\repository\impl;

use App\domain\entity\OrderItem;
use App\infra\mapper\OrderItemMapper;
use App\infra\persistence\repository\contract\OrderItemRepository;
use Illuminate\Support\Facades\DB;

class OrderItemRepositoryImpl implements OrderItemRepository
{
    private OrderItemMapper $mapper;

    public function __construct(OrderItemMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    function create(array $data): OrderItem
    {
        $id = DB::table("t_order_items")->insertGetId($data);
        $data['id'] = $id;
        return $this->mapper->fromArray($data);
    }

    /**
     * @return OrderItem[]|null
     */
    function findByOrderId(int $orderId): ?array
    {
        $orderItems = DB::table('t_order_items')->where('order_id', $orderId)->get();
        return $orderItems?->map(function ($orderItem) {
            return $this->mapper->formObj($orderItem);
        })->toArray();
    }
}
