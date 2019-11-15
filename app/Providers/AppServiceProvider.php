<?php

namespace App\Providers;

use App\Respository\CustomerRepositoryInterface;
use App\Respository\Eloquent\CustomerRepository;
use App\Service\CustomerServiceInterface;
use App\Service\implement\CustomerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CustomerServiceInterface::class,CustomerService::class);
        $this->app->singleton(CustomerRepositoryInterface::class,CustomerRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
