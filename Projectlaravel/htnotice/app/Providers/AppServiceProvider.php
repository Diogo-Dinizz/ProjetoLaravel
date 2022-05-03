<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
/* em baixo aqui foi editado*/
use Illuminate\Support\Facades\Schema;  

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /* isso aqui foi editado*/
        /* Schema:: efaultStringLength(191);*/
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       Schema::defaultStringLength(191);  
    }
}
