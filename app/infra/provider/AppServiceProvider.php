<?php

namespace App\infra\provider;

use App\application\gateway\customer\CreateCustomerGateway;
use App\application\gateway\customer\FindCustomerByEmailGateway;
use App\application\gateway\customer\ListCustomersGateway;
use App\application\gateway\customer\ListProductsGateway;
use App\application\gateway\order\CreateInstallmentGateway;
use App\application\gateway\order\CreateOrderGateway;
use App\application\gateway\order\CreateOrderItemGateway;
use App\application\gateway\order\FindOrderItemByOrderIdGateway;
use App\application\gateway\order\UpdateOrderGateway;
use App\application\gateway\product\CreateProductGateway;
use App\application\gateway\product\FindProductByIdGateway;
use App\infra\persistence\repository\contract\CustomerRepository;
use App\infra\persistence\repository\contract\InstalmentRepository;
use App\infra\persistence\repository\contract\OrderItemRepository;
use App\infra\persistence\repository\contract\OrderRepository;
use App\infra\persistence\repository\contract\ProductRepository;
use App\infra\persistence\repository\impl\CustomerRepositoryImpl;
use App\infra\persistence\repository\impl\InstalmentRepositoryImpl;
use App\infra\persistence\repository\impl\OrderItemRepositoryImpl;
use App\infra\persistence\repository\impl\OrderRepositoryImpl;
use App\infra\persistence\repository\impl\ProductRepositoryImpl;
use App\infra\services\customer\CreateCustomerService;
use App\infra\services\customer\FindCustomerByEmailService;
use App\infra\services\customer\ListCustomersService;
use App\infra\services\order\CreateInstallmentService;
use App\infra\services\order\CreateOrderItemService;
use App\infra\services\order\CreateOrderService;
use App\infra\services\order\FindOrderItemByOrderIdService;
use App\infra\services\order\UpdateOrderService;
use App\infra\services\product\CreateProductService;
use App\infra\services\product\FindProductByIdService;
use App\infra\services\product\ListProductsService;
use Carbon\Laravel\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
//      Customer
        $this->app->bind(CreateCustomerGateway::class, CreateCustomerService::class);
        $this->app->bind(FindCustomerByEmailGateway::class, FindCustomerByEmailService::class);
        $this->app->bind(ListCustomersGateway::class, ListCustomersService::class);
        $this->app->bind(CustomerRepository::class, CustomerRepositoryImpl::class);

//      product
        $this->app->bind(CreateProductGateway::class, CreateProductService::class);
        $this->app->bind(FindProductByIdGateway::class, FindProductByIdService::class);
        $this->app->bind(ListProductsGateway::class, ListProductsService::class);
        $this->app->bind(ProductRepository::class, ProductRepositoryImpl::class);

//      Order
        $this->app->bind(CreateOrderGateway::class, CreateOrderService::class);
        $this->app->bind(UpdateOrderGateway::class, UpdateOrderService::class);
        $this->app->bind(OrderRepository::class, OrderRepositoryImpl::class);

//      Order Item
        $this->app->bind(CreateOrderItemGateway::class, CreateOrderItemService::class);
        $this->app->bind(FindOrderItemByOrderIdGateway::class, FindOrderItemByOrderIdService::class);
        $this->app->bind(OrderItemRepository::class, OrderItemRepositoryImpl::class);

//      Installment
        $this->app->bind(CreateInstallmentGateway::class, CreateInstallmentService::class);
        $this->app->bind(InstalmentRepository::class, InstalmentRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
