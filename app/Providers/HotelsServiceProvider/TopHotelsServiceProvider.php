<?php

namespace App\Providers\HotelsServiceProvider;

use Illuminate\Support\ServiceProvider;

use App\OurHotels\Providers\TopHotels\TopHotelProvider;

class TopHotelsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\OurHotels\Contracts\OurHotelsInterface', function ($app) {
            return new TopHotelProvider();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
