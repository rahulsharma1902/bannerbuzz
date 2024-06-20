<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\UserMeta;
use App\Models\UserBilling;
use App\Models\UserOrderDesign;
use App\Models\ProductVariationsData;
use App\Models\AccessoriesVariationsData;
use App\Models\ProductSize;
use App\Models\AccessoriesSize;
use App\Models\Order;
use App\Models\Payment;
use Stripe\{Stripe,SetupIntent,Customer,PaymentIntent,Charge,PaymentMethod};
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Auth;
use Exception;
use Session;
use Str;
use Redirect;


class CheckoutController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $this->paypalProvider = new PayPalClient;
        $this->paypalProvider->setApiCredentials(config('paypal'));
        $this->paypalProvider->getAccessToken();
       
    }
    
    public function cart()
    {
        if(Auth::check()){
            $allbasket = Basket::where('user_id',Auth::user()->id)->where('status',0)->get();
        } else {
            $temp_id = Session::get('temporaryUserId');
            if( $temp_id != null) {
                $allbasket = Basket::where('temporary_id',$temp_id)->where('status',0)->get();
            } else {
                $allbasket = null;
            }
        }
        if($allbasket){
            $total = count($allbasket);
        } else {
            $total = 0;
        }

        return view('front.checkout.cart',compact('allbasket','total'));
    }
    public function checkout()
    {
        $setup_intent = SetupIntent::create();
        $client_secret = $setup_intent->client_secret;
        
        if(Auth::check()){
            $allbasket = Basket::where('user_id',Auth::user()->id)->where('status',0)->get();
        } else {
            $temp_id = Session::get('temporaryUserId');
            $allbasket = Basket::where('temporary_id',$temp_id)->where('status',0)->get();
        }

        if($allbasket->isNotEmpty()) {
            return view('front.checkout.index', compact('setup_intent', 'client_secret','allbasket'));
        } else {
            $total = 0;
            return view('front.checkout.cart',compact('allbasket','total'));
        }
    }

    public function checkoutProcc(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());
        // die();
      
        if($request->address != null){

            $save_billing_address = $this->SaveBillingAddress($request);

            if($save_billing_address == false) {
                
               return redirect()->back()->with('error','something went wrong please try again later!');
            }
        }

        $allbasket = Basket::where('user_id',Auth::user()->id)->where('status',0)->get();
        // dd($allbasket);
        $basket_ids = [];
        if($allbasket) {
            $order_data = $this->SaveUserDesignData($request,$allbasket);
            if($order_data == false){
               
                return redirect()->back()->with('error','something went wrong please try again later!');
            } 
            $total_price = [];
            foreach($order_data as $id){
               $order_design = UserOrderDesign::find($id);
               $total_price[] =  $order_design->total_price;
            }
           
            foreach($allbasket as $basket_data){
                $basket_ids[] =  $basket_data->id;
            }
        } else {
            return redirect()->back()->with('error','something went wrong please try again later!');
        }

        if($request->delivery_type == 'express') {
            $ship_amount = 5;
        } else {
            $ship_amount = 8;
        }

        $orderNum = 'Ord_'.strtoupper(Str::random(10));

        $order_details = new Order();
        $order_details->user_id = Auth::user()->id;
        $order_details->order_number = $orderNum;
        // $order_details->confirmation_email = $request->confirmation_email;
        $order_details->billing_address_id = $save_billing_address['billing_id'];
        // $order_details->shipping_address_id = $save_billing_address['shipping_id'];
        $order_details->user_order_data = json_encode($order_data);
        $order_details->product_price = array_sum($total_price);
        $order_details->shipping_charges = $ship_amount;
        $order_details->additional_charges = null;
        $order_details->total_price = array_sum($total_price) + $ship_amount;
        $order_details->currency = 'GBP';
        $order_details->status = 'pending';
        $order_details->payment_method = $request->payment_method;
        // $order_details->basket_data = json_encode($basket_ids);
        $order_details->save();

        $products_price = array_sum($total_price);
        $amount = array_sum($total_price) + $ship_amount;
        $currency = 'USD';

        $paymentdata = [];
        $paymentdata['order_id'] = $order_details->id;
        $paymentdata['order_num'] = $order_details->order_number;
        $paymentdata['currency'] = $currency;
        $paymentdata['products_price'] = $products_price;
        $paymentdata['shipping_charges'] = $ship_amount;
        $paymentdata['total_price'] = $amount;
        $paymentdata['payment_method'] = $order_details->payment_method;
        $paymentdata['user_email'] = $request->confirmation_email;
        $paymentdata['basket_ids'] = $basket_ids;
        // $paymentdata['payment_method'] = $order_details->payment_method;

        if($request->payment_method == 'stripe'){

            $paymentdata['stripe_payment_method'] = $request->token;

            if(Auth::user()->stripe_customer_id != null) {
                
                $stripe_customer = Customer::retrieve(Auth::user()->stripe_customer_id, []);
                if($stripe_customer->id){
                    $paymentdata['stripe_customer_id'] = Auth::user()->stripe_customer_id;
                } else {
                    $stripe_customer_id = $this->CreateStripeCustomer($request);

                    Auth::user()->update(['stripe_customer_id' => $stripe_customer_id]);
                    $paymentdata['stripe_customer_id'] = $stripe_customer_id;
                }
            } else {
                $stripe_customer_id = $this->CreateStripeCustomer($request);

                Auth::user()->update(['stripe_customer_id' => $stripe_customer_id]);
                $paymentdata['stripe_customer_id'] = $stripe_customer_id;
            }

            $paymentMethod = PaymentMethod::retrieve($request->token);
            $paymentMethod->attach(['customer' => $paymentdata['stripe_customer_id']]);
            $paymentObj = $this->PaymentWithStripe($paymentdata);

            if($paymentObj != null) {
                $payment_data = new Payment();
                $payment_data->order_id = $order_details->id;
                $payment_data->user_id = Auth::user()->id;
                $payment_data->payment_method = $request->payment_method;
                $payment_data->amount = $paymentObj->amount;
                $payment_data->transaction_id = $paymentObj->id;
                $payment_data->currency = $paymentObj->currency;
                $payment_data->payment_status = $paymentObj->status;
              

                if($paymentObj->status == 'succeeded') {

                    // $payment_data->status = true;
                    $payment_data->save();

                    $order = Order::find($order_details->id);
                    $order->status = $paymentObj->status;
                    $order->save();

                    $mail_data = $this->SendOrderMail($payment_data->id,$order->id);

                    return redirect('/order-received/'.$order->order_number)->with('success','payment success');
                } else {
                    // $payment_data->status = false;
                    $payment_data->save();

                    return redirect('checkout')->with('error' , 'Something went wrong.');
                }
            } else {
                return redirect('checkout')->with('error' , 'Something went wrong.');
            }
        } 
        if($request->payment_method == 'paypal'){
            
            $paymentdata['payment_error_url'] = url('checkout');
            $paypal = $this->PaymentWithPaypal($request,$paymentdata);

            if (isset($paypal['id'])) {
                foreach ($paypal['links'] as $link) {
                    if ($link['rel'] === 'approve') {
                        return Redirect::away($link['href']);
                    }
                }
                return redirect('checkout')->with('error' , 'Something went wrong.');
            } else {
                return redirect('checkout')->with('error' , $paypal['message']);
            }
        }
    }

    public function PaymentWithStripe($data)          // payment using stripe 
    {
        try{

            $paymentIntentObject = PaymentIntent::create([
                'amount' => (int) $data['total_price'] * 100,
                'currency' => $data['currency'],
                'customer' => $data['stripe_customer_id'],
                'payment_method_types' => ['card'],
                'payment_method' => $data['stripe_payment_method'],
                'metadata' => ['order_id' => $data['order_id']],
                'capture_method' => 'automatic',
                'confirm' => true,
                'off_session' => true,
                'description' => 'Customized banners',
            ]);

            return $paymentIntentObject;

        } catch(Exception $e){
            // dd($e);
            return null; 
        }
        
    }
    function CreateStripeCustomer($request)        // create stripe customer
    {

        $stripeCustomer = Customer::create([
            'name' => $request['name_on_card'],
            'email' => Auth::user()->email,
            'address' => [
                'line1' => $request->address['address_line'],
                'city' => $request->address['zip_code'],
                'postal_code' => $request->address['zip_code'],
                'state' => $request->address['state'],
                'country' => $request->address['country']
            ],
            'payment_method' => $request['token'],
        ]);

        $stripe_customer_id = $stripeCustomer->id;

        return $stripe_customer_id;
    }

    function PaymentWithPaypal($request,$paymentdata)
    {
        try {
            $successData = base64_encode(json_encode($paymentdata));
            $cancelData = base64_encode(json_encode($paymentdata));

            $response = $this->paypalProvider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "user_action" => "PAY_NOW",
                    "return_url" => route('payment.success', [ 'meta_data' => $successData]),
                    "cancel_url" => route('payment.fail', [ 'meta_data' => $cancelData]),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => $paymentdata['currency'],
                            "value" => $paymentdata['total_price']
                        ],
                        "description" => "Customized banners",
                        "custom_id" => $paymentdata['order_id']
                    ]
                ]
            ]);

            return  $response;      

        } catch( Exception $e ){
            return null ; 
        } 
           
    }

    public function paypalPaymentSuccess(Request $request)
    {
        try {
            $responseData = json_decode(base64_decode($request->meta_data));
            $response = $this->paypalProvider->capturePaymentOrder($request->token);
            if (isset($response['status']) && $response['status'] == 'COMPLETED') {
                $payment_data = new Payment();
                $payment_data->order_id = $responseData->order_id;
                $payment_data->user_id = Auth::user()->id;
                $payment_data->payment_method = $responseData->payment_method;
                $payment_data->amount = $responseData->total_price;
                $payment_data->transaction_id = $response['id'];
                $payment_data->currency = $responseData->currency;
                $payment_data->payment_status = $response['status'];
                // $payment_data->status = true;
                $payment_data->save();
    
                // Update the order status
                $order = Order::find($responseData->order_id);
                if ($order) {
                    $order->status = 'completed';
                    $order->save();
                }
                return redirect('/order-received/'.$order->order_number)->with('success','payment success');
            } else {
                return redirect('checkout')->with('error', 'Payment failed');
            }
        } catch (Execption $e) {

        }
    }

    public function paypalPaymentfail(Request $request)
    {
        $responseData = json_decode(base64_decode($request->meta_data));
        if(isset($responseData['basket_ids'])) {
            foreach($responseData['basket_ids'] as $id) {
                $basket =  Basket::find($id);
                if( $basket) {
                    $basket->update(['status' => 0]);
                }
            }
        }
        
        return redirect('checkout')->with('error', 'Payment failed');
    }

    function SaveBillingAddress($request)        // saving user billing and shipping address
    {
        try {
            $data = [];
            if($request->address['id'] != null){
                $user_addr = UserMeta::find($request->address['id']);
                if(!$user_addr) {
                    $user_addr = UserMeta::where('user_id',Auth::user()->id)->first();
                    if(!$user_addr) {
                        $user_addr = new UserMeta();
                    }
                }
            } else {
                $user_addr = UserMeta::where('user_id',Auth::user()->id)->first();
                if(!$user_addr) {
                    $user_addr = new UserMeta();
                }
            }
            $user_addr->user_id = Auth::user()->id;
            $user_addr->first_name = $request->address['first_name'];
            $user_addr->last_name = $request->address['last_name'];
            $user_addr->email = $request->address['email'];
            $user_addr->order_confirmation_email = $request->confirmation_email;
            $user_addr->phone_number = $request->address['phone'];
            $user_addr->company_name = $request->address['company_name'];
            $user_addr->address = $request->address['address_line'];
            $user_addr->additional_address = $request->address['street'];
            $user_addr->city = $request->address['city'];
            $user_addr->state = $request->address['state'];
            $user_addr->zip_code = $request->address['zip_code'];
            $user_addr->country = $request->address['country'];
            $user_addr->save();

            $data['billing_id'] = $user_addr->id;

            if($request->additional_billing != 'same'){
                if($request->ship_addr['id'] != null){
                    $user_shipaddr = UserBilling::find($request->ship_addr['id']);
                    if(!$user_shipaddr) {
                        $user_shipaddr = UserBilling::where('user_id',Auth::user()->id)->first();
                        if(!$user_shipaddr) {
                            $user_shipaddr = new UserBilling();
                        }
                    }
                } else {
                    $user_shipaddr = UserBilling::where('user_id',Auth::user()->id)->first();
                    if(!$user_shipaddr) {
                        $user_shipaddr = new UserBilling();
                    }
                }
                $user_shipaddr->user_id = Auth::user()->id;
                $user_shipaddr->first_name = $request->ship_addr['first_name'];
                $user_shipaddr->last_name = $request->ship_addr['last_name'];
                $user_shipaddr->email = $request->ship_addr['email'];
                $user_shipaddr->phone_number = $request->ship_addr['phone'];
                $user_shipaddr->company_name = $request->ship_addr['company_name'];
                $user_shipaddr->address = $request->ship_addr['address_line'];
                $user_shipaddr->additional_address = $request->ship_addr['street'];
                $user_shipaddr->city = $request->ship_addr['city'];
                $user_shipaddr->state = $request->ship_addr['state'];
                $user_shipaddr->zip_code = $request->ship_addr['zip_code'];
                $user_shipaddr->country = $request->ship_addr['country'];
                $user_shipaddr->save();
                $data['shipping_id'] = $user_shipaddr->id;
            } else {
                $data['shipping_id'] = null;
            }

            return $data;
        } catch (Exception $e) {
            return false;
        }
    }

    function SaveUserDesignData($request,$allbasket)     // saving user designs and product data
    {
        try {
            $orderDesign_ids = [];
            foreach($allbasket as $basket) {
                if(Auth::user()->id == $basket->user_id) {
                    $userOrderDesign = new UserOrderDesign();
                    $userOrderDesign->user_id = Auth::user()->id;
                    $userOrderDesign->product_id = $basket->product_id;
                    $userOrderDesign->accessorie_id = $basket->accessorie_id;
                    $userOrderDesign->product_type = $basket->product_type;
                    $userOrderDesign->design_id = $basket->design_id;
                    $userOrderDesign->design_method = $basket->design_method;
                    $userOrderDesign->images = $basket->images;
                    $userOrderDesign->size_id = $basket->size_id;
                    $userOrderDesign->width = $basket->width;
                    $userOrderDesign->height = $basket->height;
                    $userOrderDesign->dimension = $basket->dimension;
                    $userOrderDesign->size_type = $basket->size_type;
                    $userOrderDesign->variations = $basket->variations;
                    $userOrderDesign->template_data = $basket->template_data;
                    $userOrderDesign->qty = $basket->qty;
                    $userOrderDesign->size_type = $basket->size_type;
                    $product_price = null;
                    $total_price = null ;
                    if($basket->product_type == 'accessories') {
                        if($basket->size_id != null) {
                            $size = AccessoriesSize::find($basket->size_id);
                            if($size){
                                $product_price  = $size->price;
                            }
                        } else {
                            $product_price = $basket->accessorie->price;
                        }
                        $var_price = [];
                        foreach(json_decode($basket->variations,true) as $key => $variation){
                            $data = AccessoriesVariationsData::find($variation);
                            if($data){
                                $var_price[] = $data->price;
                            }
                        }

                        $total_price = round(($product_price + array_sum( $var_price)) * $basket->qty);

                        $userOrderDesign->price = $product_price;
                        $userOrderDesign->total_price = $total_price;

                    } else {
                        if($basket->size_id != null) {
                            $size = ProductSize::find($basket->size_id);
                            if($size){
                                $product_price  = $size->price;
                            }
                        } elseif($basket->width != null && $basket->height != null) {
                            $value = $basket->dimension;
                            if ($value == 'In') {
                                $unit_value = 12;
                            } else if ($value == 'Cm') {
                                $unit_value = 30;
                            } else if ($value == 'Mm') {
                                $unit_value = 304;
                            } else if ($value == 'Ft') {
                                $unit_value = 1;
                            }

                            $default_product_price = $basket->product->price;
                            $price_pre_unit = ($default_product_price / $unit_value) / 2;
                            $product_price = round(($basket->width + $basket->height) * $price_pre_unit);
                        } else {
                            $product_price = $basket->product->price;
                        }
                       
                        $var_price = [];
                        foreach(json_decode($basket->variations,true) as $key => $variation){
                            $data = ProductVariationsData::find($variation);
                            if($data){
                                $var_price[] = $data->price;
                            }
                        }

                        $total_price = round(($product_price + array_sum( $var_price)) * $basket->qty);

                        $userOrderDesign->price = $product_price;
                        $userOrderDesign->total_price = $total_price;
                    }

                    $basket->status = 1;
                    $basket->save();
                    // dd($product_price,$total_price);
                    $userOrderDesign->save();
                    $orderDesign_ids[] = $userOrderDesign->id;
                }
                
            }

            return $orderDesign_ids;
        
        } catch (Exception $e) {
            return false;
        }
    }

    public function OrderReceived(Request $request)
    {
        $order_num = $request->order_num;
        // dd($order_num);
        $order = Order::where('order_number',$order_num)->first();
        if($order){
            return view('front.checkout.order_received',compact('order_num'));
        } else {
            abort(404);
        }
        return view('front.checkout.order_received',compact('order_num'));
    }

    // order confirmation mail
    function SendOrderMail($payment_id,$order_id) 
    {
        
    }
}
