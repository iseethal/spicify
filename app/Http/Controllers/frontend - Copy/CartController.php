<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\WishList;
use App\Models\OrderItem;
use App\Models\ProductAmountOptions;

use Illuminate\Http\Request;
use App\Models\CompareProduct;
use App\Models\VariantOptions;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function Cart()
    {
        $cart = session()->get('cart', []);
        $cart = Cart::where('buy_now', 0)->where('user_id', Auth::id())->orderBy('id','desc')->get();
        return view('frontend.cart', compact('cart'));
    }

    public function AddToCart(Request $request)
    {
        // dd($request->all());
        $val                = $request->buynow;
        $productid          = $request->product_id;
        $quant              = $request->product_qty;
        $c_amount_id        = $request->c_amount_id;

        $product_qty_name   = ProductAmountOptions::where('is_deleted','<>', 1)->where('id','=', $c_amount_id)->pluck('qty_name')->first();
        $product_amount     = ProductAmountOptions::where('is_deleted','<>', 1)->where('id','=', $c_amount_id)->pluck('amount')->first();

        $product            = VariantOptions::findOrFail($productid);
        $productname        = $product->name;
        $productimage       = $product->image;

        // $productamount = $product->amount;
        $totalamount        = $product_amount * $quant;

        // remove id from wishlist
        if(Session::has('wishlist')){
            if ($request->wishlist_id) {
                $id = $request->wishlist_id;
                Session::forget('wishlist.' . $id);
            }
        }

        if(Auth::id()){

            if(Session::has('cart')){

                $cart = session()->get('cart', []);
                dd($cart);

                foreach (session('cart') as $id =>  $cart_items ){

                    $variant_option_id = $cart_items['id'];
                    $product_name      = $cart_items['product_name'];
                    $image             = $cart_items['image'];
                    $quantity          = $cart_items['quantity'];
                    $amount            = $product_amount;
                    $amount_id         = $c_amount_id;
                    $total_amount      = $amount * $quantity;

                    $cart                    = new Cart;
                    $cart->user_id           = Auth::id();
                    $cart->variant_option_id = $variant_option_id;
                    $cart->product_name      = $product_name;
                    $cart->image             = $image;
                    $cart->amount_id         = $amount_id;
                    $cart->quantity          = $quantity;
                    $cart->amount            = $amount;
                    $cart->total_amount      = $total_amount;
                    $cart->save();
                }

                $cart                    = session()->forget('cart');

                $cart                    = new Cart;
                $cart->user_id           = Auth::id();
                $cart->variant_option_id = $productid;
                $cart->product_name      = $productname;
                $cart->image             = $productimage;
                $cart->quantity          = $quant;
                $cart->amount            = $product_amount;
                $cart->amount_id         = $c_amount_id;
                $cart->total_amount      = $totalamount;
                $cart->save();
            }

            // CHECKING IF THE PRODUCT ALREADY EXISTS IN CART
            $cart_product   = Cart::where('variant_option_id', $productid)->where('user_id', Auth::id())->pluck('id')->first();

            if ($cart_product==null) {

                $cart                    = new Cart;
                $cart->user_id           = Auth::id();
                $cart->variant_option_id = $productid;
                $cart->product_name      = $productname;
                $cart->image             = $productimage;
                $cart->quantity          = $quant;
                $cart->amount            = $product_amount;
                $cart->amount_id         = $c_amount_id;
                $cart->total_amount      = $totalamount;
                $cart->save();

                return redirect()->back()->with('message','Product added to cart ');

            }else{

                return redirect()->back()->with('info','Product already added in cart ');
            }
        }
        else {

            $cart = session()->get('cart', []);
            $i    = 0;

            if (isset($cart[$productid])) {

                $cart[$productid]  = 1;

                $temp   = $productid;
                $value  = $request->session()->get('cart', 'id');

                if ($temp =  $value) {
                    return redirect()->route('frontend.shop');
                }

            } else {

                $cart[$productid] = [

                    "id"            => $productid,
                    "product_name"  => $productname,
                    "image"         => $productimage,
                    "quantity"      => $quant,
                    "amount"        => $product_amount,
                    "amount_id"     => $c_amount_id,
                    "total_amount"  => $totalamount,
                ];
            }
            session()->put('cart', $cart);
        }

        if ($val == 'buynow'){
            return redirect()->route('checkout');
        } else {
            return redirect()->back()->with('message','Product added to cart ');
        }
    }

    // session delete
    public function remove(Request $request, $id)
    {
        if ($id) {

            $cart = session()->get('cart');

            if (isset($cart[$id])) {

                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            session()->flash('error', 'Product removed ');
        }
        return redirect()->back();
    }

    public function RemoveCart($id)
    {
        Cart::destroy($id);
        return redirect()->back()->with('error','Product removed ');
    }

    public function WishList()
    {
        $wishlist = WishList::where('user_id', Auth::id())->orderBy('id','desc')->get();
        return view('frontend.wishlist', compact('wishlist'));
    }

    public function OrderHistory()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('id','desc')->get();
        return view('frontend.order_history', compact('orders'));
    }

    public function AddToWishList(Request $request)
    {
        $productid     = $request->product_id;
        // $quant         = $request->product_qty;
        $quant         = 1;

        $product       = VariantOptions::findOrFail($productid);
        $productname   = $product->name;
        $productimage  = $product->image;

        $product_amount_options = ProductAmountOptions::where('is_deleted','<>', 1)->where('product_id','=', $productid)->get();
        $min_amount             = ProductAmountOptions::where('is_deleted','<>', 1)->where('product_id','=', $productid)->min('amount');
        $min_amount_id          = ProductAmountOptions::where('product_id','=', $productid)->where('amount','=', $min_amount)->pluck('id')->first();

        // $productamount = $product->amount;
        // $totalamount   = $productamount * $quant;
        $totalamount   = $min_amount * $quant;

        if(Auth::id()){

            if(Session::has('wishlist')){

                $wishlist = session()->get('wishlist', []);
                foreach (session('wishlist') as $id =>  $wishlist_items ){

                    $variant_option_id = $wishlist['id'];
                    $product_name      = $wishlist['product_name'];
                    $image             = $wishlist['image'];
                    $quantity          = $wishlist['quantity'];
                    $amount            = $wishlist['amount'];
                    $total_amount      = $amount * $quantity;

                    $wishlist                    = new WishList;
                    $wishlist->user_id           = Auth::id();
                    $wishlist->variant_option_id = $variant_option_id;
                    $wishlist->product_name      = $product_name;
                    $wishlist->image             = $image;
                    $wishlist->quantity          = $quantity;
                    $wishlist->amount            = $amount;
                    $wishlist->total_amount      = $total_amount;
                    $wishlist->save();

                }

                $wishlist = session()->forget('wishlist');

                $wishlist                    = new WishList;
                $wishlist->user_id           = Auth::id();
                $wishlist->variant_option_id = $productid;
                $wishlist->product_name      = $productname;
                $wishlist->image             = $productimage;
                $wishlist->quantity          = $quant;
                $wishlist->amount            = $min_amount;
                $wishlist->save();

            }

            // CHECKING IF THE PRODUCT ALREADY EXISTS IN CART
            $wishlist_product   = WishList::where('variant_option_id', $productid)->where('user_id', Auth::id())->pluck('id')->first();

            if ($wishlist_product==null) {

                $wishlist                    = new WishList;
                $wishlist->user_id           = Auth::id();
                $wishlist->variant_option_id = $productid;
                $wishlist->product_name      = $productname;
                $wishlist->image             = $productimage;
                $wishlist->quantity          = $quant;
                $wishlist->amount            = $min_amount;
                $wishlist->save();

            }else{

                return redirect()->back()->with('info','Product already added in cart ');
            }

        } else {

            $wishlist = session()->get('wishlist', []);
            $i = 0;

            if (isset($wishlist[$productid])) {
                $wishlist[$productid]  = 1;

                $temp   = $productid;
                $value  = $request->session()->get('wishlist', 'id');

                if ($temp =  $value) {

                    // return redirect()->route('frontend.shop')->with('info','Product already added');
                    return redirect()->back()->with('info','Product already added');
                }
            } else {

                $wishlist[$productid] = [

                    "id"            => $productid,
                    "product_name"  => $productname,
                    "image"         => $productimage,
                    "quantity"      => $quant,
                    "amount"        => $min_amount,
                    "total_amount"  => $totalamount,
                ];
            }
            session()->put('wishlist', $wishlist);
        }
        return redirect()->back()->with('message','Product added to wishlist');

    }

    // public function RemoveWishList(Request $request)
    // {
    //     if ($request->id) {

    //         $wishlist = session()->get('wishlist');
    //         if (isset($wishlist[$request->id])) {

    //             unset($wishlist[$request->id]);
    //             session()->put('wishlist', $wishlist);
    //         }
    //         session()->flash('error', 'Product removed ');
    //     }

    // }

    public function DeleteWishList(Request $request)
    {

        $id = $request->id;
        if(Session::has('wishlist')){
            Session::forget('wishlist.' . $id);
            return redirect()->back()->with('error','Product removed successfully');
        } else {

            WishList::destroy($id);
            return redirect()->back()->with('error','Product removed ');
        }
    }

    public function WishlistToCart(Request $request)
    {
        $productid     = $request->product_id;
        $quant         = $request->product_qty;

        $product       = VariantOptions::findOrFail($productid);
        $productname   = $product->name;
        $productimage  = $product->image;
        $productamount = $product->amount;
        $totalamount   = $productamount * $quant;

        if(Session::has('wishlist')){

            $wishlist = session()->get('wishlist', []);
            foreach (session('wishlist') as $id =>  $wishlist_items ){

                $variant_option_id = $wishlist['id'];
                $product_name      = $wishlist['product_name'];
                $image             = $wishlist['image'];
                $quantity          = $wishlist['quantity'];
                $amount            = $wishlist['amount'];
                $total_amount      = $amount * $quantity;

                $cart                    = new Cart;
                $cart->user_id           = Auth::id();
                $cart->variant_option_id = $variant_option_id;
                $cart->product_name      = $product_name;
                $cart->image             = $image;
                $cart->quantity          = $quantity;
                $cart->amount            = $amount;
                $cart->total_amount      = $total_amount;
                $cart->save();

            }
        }
        $cart = session()->forget('cart');

        Cart::insert([

            'user_id'              => Auth::id(),
            'variant_option_id'    => $productid,
            'product_name'         => $productname,
            'image'                => $productimage,
            'quantity'             => $quant,
            'amount'               => $productamount,
            'total_amount'         => $totalamount,
        ]);

        if($request->id != null){
            WishList::destroy($request->id);
        }
        return redirect()->back()->with('message','Product added to cart ');
    }

    public function UpdateCart(Request $request)
    {
        if (session('cart')) {

            if ($request->id && $request->quantity) {
                $cart = session()->get('cart');
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                session()->flash('message', 'Cart updated successfully');
            }
        } else {

            $cart               = Cart::find($request->id);
            $cart->quantity     = $request->quantity;
            $cart->total_amount = $request->total_amount;
            $cart->save();

            return redirect()->back()->with('message', 'Cart updated successfully');
        }
    }
}
