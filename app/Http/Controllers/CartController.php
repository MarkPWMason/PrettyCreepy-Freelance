<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function checkoutPage(Request $request){
        $cart = json_decode($request->get('cartValue'));
        $actualCart = [];
        
        foreach($cart as $item){
            $actualItem = Listing::find($item->id);
            array_push($actualCart, [
                'price_data' => [
                    'currency' => 'gbp',
                    'product_data' => [
                        'name' => $actualItem->title . ' - ' . strtoupper($item->size), 
                    ],
                    //unit_amount is in pennies so has to be * 100
                    'unit_amount' => $actualItem->price * 100,
                ],
                'quantity' => $item->quantity,
            ]);
        }


        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $actualCart,
            'mode' => 'payment',
            'success_url' => route('cartSuccess'),
            'cancel_url' => route('home')
        ]);

        return redirect()->away($session->url);
    }

    public function success(){
        return view('success');
    }
}
