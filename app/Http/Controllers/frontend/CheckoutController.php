<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\OrderItem;
use App\Models\Pincode;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\ProductAmountOptions;
use App\Models\VariantOptions;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function Checkout()
    {
        if (Request()->product_name != null) {

            $cart      = Cart::where('buy_now', 1)->where('user_id', Auth::id())->get();
        } else {
            $cart      = Cart::where('user_id', Auth::id())->get();
        }

        $cartcount = Cart::where('user_id', Auth::id())->count();


        if (Auth::id()) {

            return view('frontend.checkout', compact('cart'));
        } else {
            return redirect()->route('login');
        }
    }

    public function StoreCheckout(Request $request)
    {

        // dd($request->all());
        // CHECKING IF DELIVERY IS AVAILABLE TO ENTERED PINCODE - shiya - 05/09/23
        $billing_zip_code  = $request->input("billing_zip_code");
        $pincode           = Pincode::where('pincode', '=', $billing_zip_code)->get();
        if (count($pincode) < 1) {
            return redirect()->route('frontend.shop')->with('error', 'Delivery not available to this pincode!');
        }

        if ($request->product_name != null) {

            $cart    = Cart::where('buy_now', 1)->where('user_id', Auth::id())->get();
        } else {
            $cart      = Cart::where('buy_now', 0)->where('user_id', Auth::id())->get();
        }

        $cartcount = Cart::where('user_id', Auth::id())->count();
        $val1      = $request->payment_type;

        $total     = 0; $discount = 0;
        foreach ($cart as $item) {
            $total += $item['amount'] * $item['quantity'];
            $discount += $item['discount'];
            $sub_total = $total - $discount;
        }


        if ($cartcount > 0) {

            if ($val1 == 'cash_on_delivery') {

                $orders                    = new Order();
                $orders->user_id           = Auth::id();
                $orders->transaction_id    = 'COD';
                $orders->order_date        = Carbon::now('Asia/Kolkata');
                $orders->billing_firstname = $request->input("billing_firstname");
                $orders->billing_lastname  = $request->input("billing_lastname");
                $orders->billing_phone     = $request->input("billing_phone");
                $orders->billing_email     = $request->input("billing_email");
                $orders->billing_address1  = $request->input("billing_address1");
                $orders->billing_address2  = $request->input("billing_address2");
                $orders->billing_city      = $request->input("billing_city");
                $orders->billing_state     = $request->input("billing_state");
                $orders->billing_zip_code  = $request->input("billing_zip_code");
                $orders->order_notes       = $request->input("order_notes");
                $orders->country           = $request->input("country");
                $orders->total             = $sub_total;
                $orders->save();
                $orders->id;


                foreach ($cart as $item) {

                    // dd($item->toArray());

                    $order_items               = new OrderItem();
                    $order_items->order_id     = $orders->id;
                    $order_items->product_id   = $item->variant_option_id;
                    $order_items->product_name = $item->product_name;
                    $order_items->image        = $item->image;
                    $order_items->is_coupon_applied   = $item->is_coupon_applied;
                    $order_items->amount_id    = $item->amount_id;
                    $order_items->quantity     = $item->quantity;
                    $order_items->amount       = $item->amount;
                    $order_items->discount     = $item->discount;
                    $order_items->total        = $item->total_amount;
                    $order_items->save();
                }
                Cart::destroy($cart);
                return redirect()->route('my-account');
            } else {

                $orders                    = new Order();
                $orders->user_id           = Auth::id();
                $orders->transaction_id    = '1234';
                $orders->order_date        = Carbon::now('Asia/Kolkata');
                $orders->billing_firstname = $request->input("billing_firstname");
                $orders->billing_lastname  = $request->input("billing_lastname");
                $orders->billing_phone     = $request->input("billing_phone");
                $orders->billing_email     = $request->input("billing_email");
                $orders->billing_address1  = $request->input("billing_address1");
                $orders->billing_address2  = $request->input("billing_address2");
                $orders->billing_city      = $request->input("billing_city");
                $orders->billing_state     = $request->input("billing_state");
                $orders->billing_zip_code  = $request->input("billing_zip_code");
                $orders->order_notes       = $request->input("order_notes");
                $orders->country           = $request->input("country");
                $orders->total             = $sub_total;
                $orders->save();
                $orders->id;

                foreach ($cart as $item) {

                    $order_items               = new OrderItem();
                    $order_items->order_id     = $orders->id;
                    $order_items->product_id   = $item->variant_option_id;
                    $order_items->product_name = $item->product_name;
                    $order_items->image        = $item->image;
                    $order_items->is_coupon_applied   = $item->is_coupon_applied;
                    $order_items->amount_id    = $item->amount_id;
                    $order_items->quantity     = $item->quantity;
                    $order_items->amount       = $item->amount;
                    $order_items->discount     = $item->discount;
                    $order_items->total        = $item->total_amount;
                    $order_items->save();
                }


                if ($request->product_name != null) {

                    $id  = Cart::where('user_id', Auth::id())->where('buy_now', 1)->pluck('id')->first();

                    Cart::find($id)->delete();

                    return redirect()->route('payment', ['product_name' => $request->product_name]);

                } else {

                    Cart::destroy($cart);

                    return redirect()->route('payment');

                }
            }
        }
    }

    public function BuyNow(Request $request)
    {

        if (Auth::id()) {


            $amount_id    = $request->b_amount_id;
            $quantity     = $request->product_quantity;
            $product_id   = $request->product_id;
            $amount       = ProductAmountOptions::where('id', $amount_id)->pluck('amount')->first();
            $total_amount = $amount * $quantity;
            $product_name = VariantOptions::where('id', $product_id)->pluck('name')->first();
            $image        = VariantOptions::where('id', $product_id)->pluck('image')->first();

            $buy_now = Cart::where('user_id', Auth::id())->where('buy_now', 1)->exists();
            $id      = Cart::where('user_id', Auth::id())->where('buy_now', 1)->pluck('id')->first();

            if ($buy_now == 1) {

                Cart::find($id)->delete();

                Cart::insert([

                    "user_id"            => Auth::id(),
                    "variant_option_id"  => $product_id,
                    "product_name"       => $product_name,
                    "image"              => $image,
                    "quantity"           => $quantity ?? 1,
                    "amount_id"          => $amount_id,
                    "amount"             => $amount,
                    "total_amount"       => $total_amount,
                    "buy_now"            => 1,

                ]);
            } else {

                Cart::insert([

                    "user_id"            => Auth::id(),
                    "variant_option_id"  => $product_id,
                    "product_name"       => $product_name,
                    "image"              => $image,
                    "quantity"           => $quantity ?? 1,
                    "amount_id"          => $amount_id,
                    "amount"             => $amount,
                    "total_amount"       => $total_amount,
                    "buy_now"            => 1,

                ]);
            }

            return redirect()->route('checkout', ['product_name' => $product_name]);
        } else {
            return redirect()->route('login');
        }
    }
}
