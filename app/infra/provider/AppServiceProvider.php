<?php

namespace App\infra\provider;

use App\application\gateway\customer\CreateCustomerGateway;
use App\application\gateway\customer\FindCustomerByEmailGateway;
use App\application\gateway\customer\ListCustomersGateway;
use App\infra\persistence\repository\contract\CustomerRepository;
use App\infra\persistence\repository\impl\CustomerRepositoryImpl;
use App\infra\services\customer\CreateCustomerService;
use App\infra\services\customer\FindCustomerByEmailService;
use App\infra\services\customer\ListCustomersService;
use Carbon\Laravel\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CreateCustomerGateway::class, CreateCustomerService::class);
        $this->app->bind(FindCustomerByEmailGateway::class, FindCustomerByEmailService::class);
        $this->app->bind(CustomerRepository::class, CustomerRepositoryImpl::class);
        $this->app->bind(ListCustomersGateway::class, ListCustomersService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
