<?php

namespace App\Providers;

use App\Models\AdminLanguage;
use Illuminate\Support\ServiceProvider;
use Schema;


use App\Classes\GeniusMailer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use App\Models\Category;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App;
use Illuminate\Cache\NullStore;
use Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);


        view()->composer('*', function ($settings) {
            $settings->with('gs', App\Models\Generalsetting::find(1));
            $settings->with('seo',App\Models\Seotool::find(1));
            $settings->with('categories', Category::where('status','=',1)->get());


        });

    }
}
