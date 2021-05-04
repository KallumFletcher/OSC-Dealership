<?php

namespace App\Providers;

use App\Http\Controllers\DatabaseControllerold;
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
        $this->app->bind(DatabaseControllerold::class, function ($app) {
            return DatabaseControllerold::CreateDB();
        });
    }
}
