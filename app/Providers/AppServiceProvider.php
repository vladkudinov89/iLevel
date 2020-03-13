<?php

namespace App\Providers;

use App\Repositories\Shop\Category\CategoryRepository;
use App\Repositories\Shop\Category\CategoryRepositoryInterface;
use App\Repositories\Shop\Product\ProductRepository;
use App\Repositories\Shop\Product\ProductRepositoryInterface;
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
        $this->app->bind(CategoryRepositoryInterface::class ,CategoryRepository ::class);
        $this->app->bind(ProductRepositoryInterface::class ,ProductRepository ::class);
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
