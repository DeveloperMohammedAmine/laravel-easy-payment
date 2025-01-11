<?php

namespace App\Services\PaymentMethods;

use App\Services\PaymentMethods\BasePaymentMethod;
use App\interfaces\PaymentMethods\PaymentMethodsInterface;

class MyfatoorahPaymentMethod extends BasePaymentMethod implements PaymentMethodsInterface {

    private $DynamicPaymentCredentials;

    private $api_key;

    public function __construct(array $credentials = null) {
        $this->DynamicPaymentCredentials = $credentials;
    }

    public function setCredentials() {
        $this->DynamicPaymentCredentials ? 
            $this->setCredentialsDynamically() : 
        $this->setCredentialsFromConfig();
    }

    public function setCredentialsDynamically() {
        $this->api_key = $this->DynamicPaymentCredentials['api_key'];
        $this->test_mode_status = $this->DynamicPaymentCredentials['test_mode_status'];
    }

    public function setCredentialsFromConfig() {
        $this->api_key = config('easy-payment.myfatoorah.api_key');
        $this->test_mode_status = config('easy-payment.myfatoorah.test_mode_status');  
    }

    public function pay() {

        $this->setCredentials();

        return dd($this->api_key);

    }

}