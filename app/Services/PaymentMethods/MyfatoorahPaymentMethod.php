<?php

namespace App\Services\PaymentMethods;

use App\Services\PaymentMethods\BasePaymentMethod;
use App\interfaces\PaymentMethods\PaymentMethodsInterface;

class MyfatoorahPaymentMethod extends BasePaymentMethod implements PaymentMethodsInterface{

    private $DynamicPaymentCredentials;


    public function __construct($credentials = null) {

        $this->DynamicPaymentCredentials = $credentials;
    }


    public function pay() {
        return 'pay with myfatoorah';
    }

}