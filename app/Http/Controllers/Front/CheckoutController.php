<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Basket;
use Auth;
use Session;
use Stripe\{Stripe,SetupIntent,Customer,PaymentIntent,Charge};

class CheckoutController extends Controller
{
    //
    public function cart()
    {
        if(Auth::check()){
            $allbasket = Basket::where('user_id',Auth::user()->id)->get();
        } else {
            $temp_id = Session::get('temporaryUserId');
            $allbasket = Basket::where('temporary_id',$temp_id)->get();
        }
        if($allbasket){
            $total = count($allbasket);
        } else {
            $total = 0;
        }
        // $allbasket = Basket::all();
        return view('front.checkout.cart',compact('allbasket','total'));
    }
    public function checkout()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $setup_intent = SetupIntent::create();
        $client_secret = $setup_intent->client_secret;
        
        return view('front.checkout.index', compact('setup_intent', 'client_secret'));
    }

    public function checkoutProcc(Request $request){
        echo '<pre>';
        print_r($request->all());
    }
}
