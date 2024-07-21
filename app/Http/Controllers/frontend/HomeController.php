<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Category;
use App\Models\WishList;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\CompareProduct;
use App\Models\VariantOptions;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function Home()
    {
        $product_ids = OrderItem::select('product_id')
                        ->selectRaw('COUNT(product_id) as count')
                        ->groupBy('product_id')
                        ->havingRaw('COUNT(product_id) >= 1')
                        ->orderByDesc('count')
                        ->pluck('product_id');

        $categories        = Category::where('is_active','=',1)->where('is_deleted','<>',1)->get();
        $variant_options   = VariantOptions::where('is_active','=',1)->where('is_deleted','<>',1)->get();
        $featured_products = VariantOptions::where('is_active','=',1)->where('is_deleted','<>',1)->where('is_featured','=',1)->get();
        $sliders           = Slider::where('is_active','=',1)->get();
        $wishlist = session()->get('wishlist', []);
        $contacts = Contact::where('show_followup',1)->OrderBy('id','desc')->get();

        // dd($contacts->toArray());


        return view('frontend.home',compact('categories','variant_options','featured_products','sliders','contacts','product_ids'));
    }
}
