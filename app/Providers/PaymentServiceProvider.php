<?php

namespace App\Providers;

use App\Facades\EasyPayment;
use App\Classes\PaymentSwipper;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('EasyPayment', function() {
            return new PaymentSwipper();
        });


        // Register the facade alias
        if (! class_exists('EasyPayment')) {
            class_alias(EasyPayment::class, 'EasyPayment');
        }

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
