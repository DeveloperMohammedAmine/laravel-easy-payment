<?php

namespace App\Classes;

use RuntimeException;

use App\Services\PaymentMethods\MyfatoorahPaymentMethod;
use App\Services\PaymentMethods\PaypalPaymentMethod;
use App\Services\PaymentMethods\StripePaymentMethod;



class PaymentSwipper {

    public $methodName;

    public $paymentMethodService;

    private $credentials;

    public function with($methodName) {
        $this->methodName = $methodName;
        return $this;
    }

    public function checkPaymentMethodAvailability() {
        $availablePaymentMethods = $this->getAvailableMethodNames();
        if(!in_array($this->methodName, $availablePaymentMethods)) {

            throw new RuntimeException(
                '"'.$this->methodName . '" Is Not Supported . ' .
                'Supported payment methods: ' . implode(' , ', $availablePaymentMethods)
            );
        }
    }

    public function getAvailableMethodNames() {
        return ['paypal', 'stripe', 'myfatoorah'];
    }

    public function getPaymentMethodService() {

        $this->checkPaymentMethodAvailability();

        $this->paymentMethodService = "App\\Services\\PaymentMethods\\".ucwords($this->methodName)."PaymentMethod" ;
        return $this;
    }

    public function setCredentials(array $credentials) {
        $this->credentials = $credentials;
        return $this;
    }

    public function pay() {
        $this->getPaymentMethodService();
        $paymentMethod = new $this->paymentMethodService($this->credentials);

        return $paymentMethod->pay();
    }

}