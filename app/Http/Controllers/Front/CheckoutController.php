<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Basket;
use Auth;
use Session;

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
        return view('front.checkout.index');
    }
}
