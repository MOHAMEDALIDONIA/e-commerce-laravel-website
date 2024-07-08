<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Facades\PayPal;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public function cancel(Request $request){
        dd($request->all());
    }
    public function success(Request $request){
       $provider =new PayPalClient();
       
        
       $provider->setApiCredentials(config('paypal'));
       $provider->getAccessToken();
       $provider->setCurrency('EUR');
       $response =$provider->capturePaymentOrder($request['token']);
       
       dd($response);
    }
    
}
