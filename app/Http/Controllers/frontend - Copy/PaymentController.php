<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Order;

use Razorpay\Api\Api;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class PaymentController extends Controller
{

    public $api;
    public function __construct($foo = null) {

        $this->api = new Api('rzp_test_C70VSqySrUJ1h7', 'EKzUbbA9OXA9HOPMXPQG30bn');


    }

    public function Payment()
    {
        $cart    = Cart::where('user_id', Auth::id())->get();
        $details = Order::where('user_id', Auth::id())->orderBy('id','desc')->limit(1)->get();
        $api     = new Api('rzp_test_C70VSqySrUJ1h7', 'EKzUbbA9OXA9HOPMXPQG30bn');

        $orders  = Order::where('user_id', Auth::id())->orderBy('id','desc')->limit(1)->get();

        $total_amount = 0;

        foreach ($orders as $item){

            $order_id    = $item->id;
            $total_amount = $item->total;

        }

        $orderData = [
            'receipt'         => time(),
            'amount'          => $total_amount * 100,
            'currency'        => 'INR',
            'payment_capture' => 1 ,// auto capture

        ];

        $razorpayOrder = $api->order->create($orderData);
        return view('frontend.payment',  compact('cart','details','razorpayOrder','orders'));
    }

    public function MakePayment(Request $request)
    {

        $orders       = Order::where('user_id', Auth::id())->orderBy('id','desc')->limit(1)->get();
        $total_amount = 0;

        foreach ($orders as $item){

            $order_id     = $item->id;
            $total_amount = $item->total;

        }

        $api = new Api('rzp_test_C70VSqySrUJ1h7', 'EKzUbbA9OXA9HOPMXPQG30bn');
        $orderid = rand(111111,999999);

        $orderData = [
            'receipt'         => time(),
            'amount'          => $total_amount *100, // 2000 rupees in paise
            'currency'        => 'INR',
            'payment_capture' => 1 ,// auto capture

            'notes'  =>[

                'order_id' => $orderid,

            ],

        ];

        $razorpayOrder = $api->order->create($orderData);

        return redirect()->route('payment')->compact('orders','razorpayOrder');


    }

    public function Success(Request $request)
    {

       $status = $this->api->payment->fetch($request->get('payment_id'));

       $paid = $request->get('payment_id');

       if(Auth::id())
       {

         $order = Order::where('user_id', Auth::id())->orderBy('id','desc')->first();
         $order->transaction_id = $paid;

         $order->update();

         $cart = Cart::where('user_id', Auth::id())->get();


         if($status->status == 'captured'){

            return redirect()->route('my-account')->with('success','payment successfully done');

         }

            return redirect()->back()->with('failed','payment failed');

      }

    }

    public function Myaccount()
    {

        $orders = Order::where('transaction_id','<>','1234')->where('user_id', Auth::id())->orderBy('id','DESC')->limit(25)->get();

       return view('frontend.myaccount',compact('orders'));

    }

}
