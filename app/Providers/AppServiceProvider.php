<?php

namespace App\Providers;

use App\Models\Product;
use App\Repositories\ProductRepositoryEloquent;
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
        $this->app->bind('App\Repositories\ProductRepositoryInterface', 'App\Repositories\ProductRepositoryEloquent');

        $this->app->bind('App\Repositories\ProductRepositoryInterface', function(){
            return new ProductRepositoryEloquent(new Product());
        });
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
