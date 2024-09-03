<?php

namespace App\infra\provider;

use App\application\gateway\customer\CreateCustomerGateway;
use App\application\gateway\customer\FindCustomerByEmailGateway;
use App\application\gateway\customer\ListCustomersGateway;
use App\application\gateway\product\CreateProductGateway;
use App\infra\persistence\repository\contract\CustomerRepository;
use App\infra\persistence\repository\contract\ProductRepository;
use App\infra\persistence\repository\impl\CustomerRepositoryImpl;
use App\infra\persistence\repository\impl\ProductRepositoryImpl;
use App\infra\services\customer\CreateCustomerService;
use App\infra\services\customer\FindCustomerByEmailService;
use App\infra\services\customer\ListCustomersService;
use App\infra\services\product\CreateProductService;
use Carbon\Laravel\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
//        Customer
        $this->app->bind(CreateCustomerGateway::class, CreateCustomerService::class);
        $this->app->bind(FindCustomerByEmailGateway::class, FindCustomerByEmailService::class);
        $this->app->bind(ListCustomersGateway::class, ListCustomersService::class);
        $this->app->bind(CustomerRepository::class, CustomerRepositoryImpl::class);

//        product
        $this->app->bind(CreateProductGateway::class, CreateProductService::class);
        $this->app->bind(ProductRepository::class, ProductRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
