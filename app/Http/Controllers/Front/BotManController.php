<?php

namespace App\Http\Controllers\Front;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Conversations\Conversation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class BotManController extends Controller
{
    public function handle(Request $request)
    {
        $botman = app('botman');

        $botman->hears('/^hi|hello|hey|holla|hi|hii|hola|howdy|ORDER|order/i', function (BotMan $bot) {
            $name = session()->get('user_name');

            if ($name) {
                $bot->startConversation(new OrderConversation($name));
            } else {
                $bot->startConversation(new WelcomeConversation());
            }
        });
        $botman->hears('/^ok|okk|ok|done|rodger/i', function (BotMan $bot){
            $name = session()->get('user_name');
            if ($name) {
                $bot->reply('If you have any further issue then you can reach us at info@cre8iveprinter.co.uk');
            } else {
                $bot->startConversation(new WelcomeConversation());
            }
        });
        $botman->fallback(function (BotMan $bot) {
            $bot->reply('Sorry, I did not understand that if you have any further Issue you can contact us at info@cre8iveprinter.co.uk');
        });

        $botman->listen();
    }
}

class WelcomeConversation extends Conversation
{
    protected $name;

    public function askName()
    {
        $this->ask('Would you mind telling us your name?', function (Answer $answer) {
            $this->name = $answer->getText();
            $this->say('Nice to meet you, ' . $this->name . '!');
            session()->put('user_name', $this->name);
            $this->bot->startConversation(new OrderConversation($this->name));
        });
    }

    public function run()
    {
        $this->askName();
    }
}

class OrderConversation extends Conversation
{
    protected $name;
    protected $orderNumber;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function askOrderNumber()
    {
        $this->ask($this->name . ', can you share your order number so we can give you your order details?', function (Answer $answer) {
            $this->orderNumber = $answer->getText();
            $this->checkOrderNumber();
        });
    }

    public function checkOrderNumber()
    {
        $order = Order::where('order_number', $this->orderNumber)->first();
    
        if ($order) {
            switch ($order->order_state) {
                case 'placed':
                    $this->say('Thank you for placing your order. Your order has been placed, and we will complete it as soon as possible.');
                    break;
                case 'packed':
                    $this->say('Your order has been packed and is ready for shipping. We will deliver your product very soon :)');
                    break;
                case 'shipping':
                    $this->say('Your item has been shipped. We will deliver your product very soon :)');
                    break;
                case 'out':
                    $this->say('Your order is out for delivery. It will reach you soon.');
                    break;
                case 'delivered':
                    $this->say('Your order has been already delivered. Order number: ' . $this->orderNumber . '.');
                    break;
                case 'pending':
                    $this->say('There seems to be a payment issue with your order. Please contact our support team.');
                    break;
                default:
                    $this->say('Your order state is currently unknown. Please contact our support team for more information.');
                    break;
            }
            // $this->say('Thank you! Here are the details for your order number ' . $this->orderNumber . '.');
        } else {
            $this->say('I think you shared the wrong order number.');
            $this->askOrderNumberAgain();
        }
    }
    

    public function askOrderNumberAgain()
    {
        $this->ask('Please provide your order number again:', function (Answer $answer) {
            $this->orderNumber = $answer->getText();
            $this->checkOrderNumber();
        });
    }

    public function run()
    {
        $this->askOrderNumber();
    }
}
