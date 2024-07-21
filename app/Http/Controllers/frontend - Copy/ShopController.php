<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Enquiry;
use App\Models\Category;
use App\Models\Variants;
use App\Models\WishList;
use Illuminate\Http\Request;

use App\Models\VariantOptions;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\ProductAmountOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ShopController extends Controller
{

    public function Shop(Request $request)
    {

        if(Auth::id()){

            if(Session::has('cart')){

                $cart = session()->get('cart', []);

                foreach (session('cart') as $id =>  $cart_items ){

                    $variant_option_id = $cart_items['id'];
                    $product_name      = $cart_items['product_name'];
                    $image             = $cart_items['image'];
                    $quantity          = $cart_items['quantity'];
                    $amount            = $cart_items['amount'];
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
                $cart = session()->forget('cart');
            }

            if(Session::has('wishlist')){

                $wishlist = session()->get('wishlist', []);
                foreach (session('wishlist') as $id =>  $wishlist_items ){

                    $variant_option_id = $wishlist_items['id'];
                    $product_name      = $wishlist_items['product_name'];
                    $image             = $wishlist_items['image'];
                    $quantity          = $wishlist_items['quantity'];
                    $amount            = 0;

                    $wishlist                    = new WishList;
                    $wishlist->user_id           = Auth::id();
                    $wishlist->variant_option_id = $variant_option_id;
                    $wishlist->product_name      = $product_name;
                    $wishlist->image             = $image;
                    $wishlist->quantity          = $quantity;
                    $wishlist->amount            = $amount;
                    $wishlist->save();
                }
                $wishlist = session()->forget('wishlist');
            }
        }
        $id                = $request->get('id');
        $categories        = Category::where('is_deleted', '<>', 1)->where('is_active', '=', 1)->get();
        $variant_id        = $request->variant_id;
        $category_id       = Variants::where('id', $variant_id)->pluck('category_id')->first();
        $featured_products = VariantOptions::where('is_active', '=', 1)->where('is_deleted', '<>', 1)->where('is_featured', '=', 1)->get();


        if (!empty($request->get('id'))) {

            $variant_options = VariantOptions::where('category_id', $id)->where('is_deleted', '<>', '1')->where('is_active', '=', '1')->orderBy('id', 'desc')->paginate(9)->withQueryString();
        } else if ($variant_id != null) {

            $variant_options = VariantOptions::where('category_id', $category_id)->where('variant_id', $variant_id)->where('is_deleted', '<>', '1')->where('is_active', '=', '1')->orderBy('id', 'desc')->paginate(9)->withQueryString();
        } else if ($request->input('query') != null) {

            $variant_options = VariantOptions::where('name', 'like', '%' . $request->input('query') . '%')
                ->paginate(15)->withQueryString();
        } else {

            $variant_options = VariantOptions::orderBy('id', 'desc')->where('is_deleted', '<>', '1')->where('is_active', '=', '1')->paginate(9)->withQueryString();
        }


        return view('frontend.shop', compact('categories', 'variant_options', 'featured_products'));
    }

    public function ProductDetails(Request $request)
    {

        $id                     = $request->id;
        $variant_options        = VariantOptions::findOrFail($id);
        $category_id            = $variant_options->category_id;

        $product_amount_options = ProductAmountOptions::where('is_deleted','<>', 1)->where('product_id','=', $id)->get();
        $min_amount             = ProductAmountOptions::where('is_deleted','<>', 1)->where('product_id','=', $id)->min('amount');
        $min_amount_id          = ProductAmountOptions::where('product_id','=', $id)->where('amount','=', $min_amount)->pluck('id')->first();

        $relatedProduct         = VariantOptions::where('category_id', '=', $category_id)
            ->where('is_deleted', '<>', '1')
            ->where('is_active', '=', '1')
            ->where('id', '!=', $id)
            ->get();

        return view('frontend.single_product', compact('variant_options', 'relatedProduct', 'product_amount_options', 'min_amount', 'min_amount_id'));
    }

    public function index()
    {
    	return view('frontend.search');
    }
    public function selectSearch(Request $request)
    {
    	$movies = [];
        if($request->has('q')){
            $search = $request->q;
            $movies =VariantOptions::select("id", "name")
            		->where('name', 'LIKE', "%$search%")
            		->get();
        }
        return response()->json($movies);
    }


}
