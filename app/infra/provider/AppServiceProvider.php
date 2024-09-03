<?php

namespace App\infra\provider;

use App\application\gateway\CreateCustomerGateway;
use App\application\gateway\FindCustomerByEmailGateway;
use App\infra\persistence\repository\contract\CustomerRepository;
use App\infra\persistence\repository\impl\CustomerRepositoryImpl;
use App\infra\services\CreateCustomerService;
use App\infra\services\FindCustomerByEmailService;
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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
