<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class EasyPayment extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'EasyPayment'; // This should match the binding name in the service provider
    }
}