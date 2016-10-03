<?php

namespace App\Providers;

use App\Category;
use App\Header;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Category $categoryModel)
    {
        $categories = $categoryModel->getCategories();
        $header = Header::find(1);
        view()->share('categories', $categories);
        view()->share('header', $header);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
