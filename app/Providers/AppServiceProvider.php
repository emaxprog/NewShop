<?php

namespace App\Providers;

use App\Category;
use App\City;
use App\Country;
use App\Header;
use App\Region;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Category $category)
    {
        $categories = $category->getCategories();
        $header = Header::find(1);
        $countries = Country::all();
        $regions = Region::all();
        $cities = City::all();
        view()->share('countries', $countries);
        view()->share('regions', $regions);
        view()->share('cities', $cities);
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
