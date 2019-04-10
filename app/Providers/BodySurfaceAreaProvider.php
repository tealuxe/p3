<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Services\BSA;

class BodySurfaceAreaProvider extends ServiceProvider
{
    /**
     * Register services.
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     * @return void
     */
    public function boot()
    {
        // https://code.tutsplus.com/tutorials/how-to-register-use-laravel-service-providers--cms-28966
        $this->app->bind('App\Library\Services\BSA', function ($app) {
            return new BSA();
        });
    }
}
