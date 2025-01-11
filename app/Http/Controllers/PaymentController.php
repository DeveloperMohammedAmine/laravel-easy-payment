<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\facades\EasyPayment;

class PaymentController extends Controller
{
    
    public function index() {

        return EasyPayment::with('test')->pay();

    }

}
