<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\FormBuilder as FormBuilder;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Models\Repositories\Product\ProductRepositoryInterface', 'App\Models\Repositories\Product\ProductRepository');
        $this->app->bind('App\Models\Repositories\ProductGroups\ProductGroupsRepositoryInterface', 'App\Models\Repositories\ProductGroups\ProductGroupsRepository');
        $this->app->bind('App\Models\Repositories\Cart\CartRepositoryInterface', 'App\Models\Repositories\Cart\CartRepository');
        $this->app->bind('App\Models\Repositories\Company\CompanyRepositoryInterface', 'App\Models\Repositories\Company\CompanyRepository');
        $this->app->bind('App\Models\Repositories\Person\PersonRepositoryInterface', 'App\Models\Repositories\Person\PersonRepository');
        
        $this->app->bind('App\Models\Repositories\Order\OrderRepositoryInterface', 'App\Models\Repositories\Order\OrderRepository');
        $this->app->bind('App\Models\Repositories\Report\ReportRepositoryInterface', 'App\Models\Repositories\Report\ReportRepository');
    }
}
