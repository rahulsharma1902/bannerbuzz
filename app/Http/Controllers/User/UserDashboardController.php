<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\UserMeta;
use Auth;
use Stripe\{Stripe,SetupIntent,Customer,PaymentIntent,Charge,PaymentMethod};
use Illuminate\Support\Facades\Log; // Add this line to use the Log facade

class UserDashboardController extends Controller
{
    public function __construct(){
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }
    public function index()
    {
        $orders = Order::where('user_id',Auth::user()->id)->get();
        $latest_order = Order::where('user_id',Auth::user()->id)->latest()->first();
        $order_count = count($orders);

        $user_meta = UserMeta::where('user_id',Auth::user()->id)->first();
        return view('user_dashboard.dashboard.index',compact('orders','order_count','user_meta','latest_order'));
    }

    public function Orders()
    {
        $orders = Order::where('user_id',Auth::user()->id)->paginate(8);
        return view('user_dashboard.orders.index',compact('orders')); 
    }

    // public function OrderDetail($order_num) 
    // {
    //     try{
    //         $order = Order::where('order_number',$order_num)->first();
    //         if($order){
    //             return view('user_dashboard.orders.order_detail',compact('order'));
    //         } else {
    //             abort(404);
    //         }
    //       } catch (Execption $e){
    //         return resposne(false);
    //     }
    // }
    public function OrderDetail($order_num) 
    {
        try {
            $order = Order::where([ ['order_number',$order_num],['user_id',auth()->user()->id] ])->first();
            if ($order) {
                return view('user_dashboard.orders.order_detail', compact('order'));
            } else {
                abort(404);
            }
        } catch (Exception $e) {
            // Log the error for debugging purposes
            Log::error("Error fetching order details: " . $e->getMessage());
            
            // Provide a user-friendly error message
            return redirect()->back()->with('error', 'Unable to retrieve order details at this time. Please try again later.');
        }
    }
    
    public function MyCards()
    {
        try{
        $setup_intent = SetupIntent::create();
        $client_secret = $setup_intent->client_secret;

        $customerId = Auth::user()->stripe_customer_id;
        if($customerId != null) {
            $customer = Customer::retrieve($customerId,[]);
            $paymentMethods = PaymentMethod::all([
                'customer' => $customer->id,
                'type' => 'card',
            ]);

            $cards = [];
            foreach ($paymentMethods->data as $paymentMethod) {
                $card = PaymentMethod::retrieve($paymentMethod->id, []);

                $cards[] = [
                    'id' => $card->id,
                    'brand' => $card->card->brand,
                    'last4' => $card->card->last4,
                    'exp_month' => $card->card->exp_month,
                    'exp_year' => $card->card->exp_year,
                    'holder_name' => $card->billing_details->name,
                ];
           
                // $key = $card->card->last4 . '_' . $card->card->brand;

                // if (!isset($uniqueCards[$key])) {

                //     $cards[$key] = [
                //         'id' => $card->id,
                //         'brand' => $card->card->brand,
                //         'last4' => $card->card->last4,
                //         'exp_month' => $card->card->exp_month,
                //         'exp_year' => $card->card->exp_year,
                //         'holder_name' => $card->billing_details->name,
                //     ];
                // }
            }

        }  else {
            $cards = null;
        }

        return view('user_dashboard.my_cards.cards',compact('cards','client_secret')); 
    } catch (\Stripe\Exception\ApiErrorException $e) {
        // Log the error for debugging purposes
        Log::error("Stripe API error: " . $e->getMessage());
        
        // Provide a user-friendly error message
        return redirect()->back()->with('error', 'Payment service is currently unavailable. Please try again later.');
    } catch (Exception $e) {
        // Log the error for debugging purposes
        Log::error("General error: " . $e->getMessage());
        
        // Provide a user-friendly error message
        return redirect()->back()->with('error', 'Oops, something went wrong. Please try again later.');
    }
    }

    public function AddCard(Request $request)
    {
        try {
            if(Auth::user()->stripe_customer_id != null) {
                    
                $stripe_customer = Customer::retrieve(Auth::user()->stripe_customer_id, []);
                if($stripe_customer->id){
                    $stripe_customer_id = Auth::user()->stripe_customer_id;
                } else {
                    $stripe_customer_id = $this->CreateStripeCustomer($request);

                    Auth::user()->update(['stripe_customer_id' => $stripe_customer_id]);
                }
            } else {
                $stripe_customer_id = $this->CreateStripeCustomer($request);

                Auth::user()->update(['stripe_customer_id' => $stripe_customer_id]);
            }

            $stripe_customer = Customer::retrieve($stripe_customer_id, []);

            $paymentMethods = PaymentMethod::all([
                'customer' => $stripe_customer->id,
                'type' => 'card',
            ]);

            $paymentMethod = PaymentMethod::retrieve($request->token);

            $isAttached = false;

            foreach($paymentMethods->data as $oldMethod) {

                $card = PaymentMethod::retrieve($oldMethod->id, []);

                if($card->card->fingerprint == $paymentMethod->card->fingerprint) {
                    $isAttached = true;
                }
            }

            if(!$isAttached) {
                $paymentMethod->attach(['customer' => $stripe_customer_id]);
            }
            
            return response(true);
        } catch (Execption $e){
            return resposne(false);
        }
    }

    public function RemoveCard($card_id)
    {
        try{
            if($card_id != null) {
                $stripe_customer = Customer::retrieve(Auth::user()->stripe_customer_id, []);

                $paymentMethods = PaymentMethod::all([
                    'customer' => $stripe_customer->id,
                    'type' => 'card',
                ]);

                foreach ($paymentMethods->data as $paymentMethod) {
                    $card = PaymentMethod::retrieve($paymentMethod->id, []);

                    if($card->id == $card_id){
                        $card->detach();

                        return redirect()->back()->with('success','card removed successfully');
                    } 
                }
            } else {
                return redirect()->back()->with('error','something went wrong');
            }
        } catch (Execption $e) {
            return redirect()->back()->with('error','something went wrong');
        }
        
    }

    function CreateStripeCustomer($request)        // create stripe customer
    {

        $stripeCustomer = Customer::create([
            'name' => $request['name_on_card'],
            'email' => Auth::user()->email,
        ]);

        $stripe_customer_id = $stripeCustomer->id;

        return $stripe_customer_id;
    }
}
