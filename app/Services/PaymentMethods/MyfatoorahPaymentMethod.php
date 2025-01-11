<?php

namespace App\Services\PaymentMethods;

use App\Services\PaymentMethods\BasePaymentMethod;
use App\interfaces\PaymentMethods\PaymentMethodsInterface;

class MyfatoorahPaymentMethod extends BasePaymentMethod implements PaymentMethodsInterface{

    private $DynamicPaymentCredentials;

    private $api_key;

    public function __construct(array $credentials = null) {

        $this->DynamicPaymentCredentials = $credentials;
    }


    public function setCredentials() {

        if($this->DynamicPaymentCredentials) {
            $this->api_key = $this->DynamicPaymentCredentials['api_key'];
            $this->test_mode_status = $this->DynamicPaymentCredentials['test_mode_status'];
        }
        
        return $this;
    }

    public function setDefaultCredentials() {
        $this->api_key = config('easy-payment.myfatoorah.api_key');
        $this->test_mode_status = config('easy-payment.myfatoorah.test_mode_status');
    }

    public function pay() {

        if(!$this->DynamicPaymentCredentials) {
            $this->setDefaultCredentials();
        } else {
            $this->setCredentials();
        }

        return  dd($this->test_mode_status);
    }

}