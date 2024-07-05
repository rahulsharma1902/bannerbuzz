<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Mail\OrderTrackingMail;
use Illuminate\Support\Facades\Mail;
class OrderTrackingController extends Controller
{
    //
    public function trackOrder(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'order_number' => 'required|exists:orders,order_number',
        ]);
    
        $order = Order::where('order_number', $request->order_number)->first();
    
        if (!$order) {
            return back()->with('error', 'Order not found');
        }
    
        $message = '';
        switch ($order->order_state) {
            case 'placed':
                $message = 'Thank you for placing your order. Your order has been placed, and we will complete it as soon as possible.';
                break;
            case 'packed':
                $message = 'Your order has been packed and is ready for shipping. We will deliver your product very soon :)';
                break;
            case 'shipping':
                $message = 'Your item has been shipped. We will deliver your product very soon :)';
                break;
            case 'out':
                $message = 'Your order is out for delivery. It will reach you soon.';
                break;
            case 'delivered':
                $message = 'Your order has already been delivered. Order number: ' . $order->order_number . '.';
                break;
            case 'pending':
                $message = 'There seems to be a payment issue with your order. Please contact our support team.';
                break;
            default:
                $message = 'Your order state is currently unknown. Please contact our support team for more information.';
                break;
        }
    
        $mailData = [
            'email' => $request->email,
            'message' => $message,
            'order_number' => $order->order_number,
        ];
    
        Mail::to($request->email)->send(new OrderTrackingMail($mailData));
    
        return redirect()->back()->with('success', 'Your Order Status has been sent to your email.');
    }
}
