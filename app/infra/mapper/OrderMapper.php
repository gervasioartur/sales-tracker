<?php

namespace App\infra\mapper;


use App\domain\entity\Order;
use App\domain\model\CreateInstallmentParams;
use App\domain\model\CreateOrderItemsParams;
use App\domain\model\CreateOrderParams;
use Illuminate\Http\Request;

class OrderMapper
{
    public function fromArray(array $data): Order
    {
        $order = new Order($data['customer_id'], $data['order_date'], $data['payment_method']);
        $order->setId($data['id']);
        $order->setTotal($data['total']);
        return $order;
    }

    public function fromEntity(Order $order): array
    {
        return [
            'customer_id' => $order->getCustomerId(),
            'order_date' => $order->getOrderDate(),
            'payment_method' => $order->getPaymentMethod(),
            'total' => $order->getTotal(),
        ];
    }

    public function fromRequest(Request $request): CreateOrderParams
    {
        $createOrderItemParam = new CreateOrderParams(
            $request->input('customerId'),
            $request->input('paymentMethod'),
        );

        $orderItems = [];
        foreach ($request->input('orderItems') as $item) {
            $productId = $item['productId'];
            $amount = $item['amount'];
            $itemEntity = new CreateOrderItemsParams($productId, $amount);
            $orderItems[] = $itemEntity;
        }

        $createInstallmentParams = [];
        foreach ($request->input('installments') as $index => $installment) {
            $value = $installment['value'];
            $dueDate = $installment['dueDate'];
            $createInstallmentParam = new  CreateInstallmentParams($value, new \DateTime($dueDate));
            $createInstallmentParams[] = $createInstallmentParam;
        }

        $createOrderItemParam->setInstallments($createInstallmentParams);
        $createOrderItemParam->setOrderItems($orderItems);
        return $createOrderItemParam;
    }
}
