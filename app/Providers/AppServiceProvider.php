<?php

namespace App\Providers;

use App\Models\cat;
use App\Models\Page;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $pages=Page::all();
        //
        Paginator::useBootstrap();
        $product_cats = cat::where('slug', 'LIKE', 'product.%')->get();
        View::share(['pages'=>$pages,'product_cats'=>$product_cats]);
    }
}
