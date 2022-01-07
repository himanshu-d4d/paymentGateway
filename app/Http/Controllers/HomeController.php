<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function welcome(){

        $stripe = new \Stripe\StripeClient('sk_test_51KBdZYSCOJGFKGzDjP2chiH3CIJk6sOh9ivXlr758OUrhX5aoKAMtNFxqGmtsZQM06eRsMhYJV6ip9Bfh4Pdz6GW00WhmT3qbY');

        $paymentIntents = $stripe->paymentIntents->create(
        [
            'amount' => 1099,
            'currency' => 'eur',
            'payment_method_types' => [
            // 'bancontact',
            'card',
            // 'eps',
            // 'giropay',
            // 'ideal',
            // 'p24',
            // 'sepa_debit',
            // 'sofort',
            ],
        ]
        );
        return view('welcome')->with(compact('paymentIntents'));
    }
     public function charge(Request $request){
         dd($request->all());

     }


}
