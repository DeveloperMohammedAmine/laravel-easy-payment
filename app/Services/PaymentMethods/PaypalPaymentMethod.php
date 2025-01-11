<?php

namespace App\Services\PaymentMethods;

use App\Services\PaymentMethods\BasePaymentMethod;
use App\interfaces\PaymentMethods\PaymentMethodsInterface;

class PaypalPaymentMethod extends BasePaymentMethod implements PaymentMethodsInterface{

    public function __construct() {

        // parent::construct();
    }


    public function pay() {
        return 'pay with paypal';
    }

}