<?php

namespace App\Providers;
use Stripe\StripeClient;

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
        $this->app->singleton(StripeClient::class, function(){
        return new StripeClient(config('services.stripe.secret_key'));
        });
    }
}
