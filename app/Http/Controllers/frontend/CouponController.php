<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Models\VariantOptions;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    public function Coupon()
    {
        $coupons = Coupon::where('status','<>',2)->OrderBy('id','desc')->get();

        return view('frontend.coupon', compact('coupons'));
    }

    public function AllCoupons()
    {
        $coupons = Coupon::where('status','<>',2)->OrderBy('id','desc')->get();

        return view('backend.coupons.all_coupons', compact('coupons'));
    }

    public function AddCoupon()
    {
        $products = VariantOptions::where('is_deleted','<>', 1)->get();

        return view('backend.coupons.add_coupons', compact('products'));
    }

    public function StoreCoupon(Request $request)
    {
        $code        =  $request->coupon_code;
        $coupon_code = Coupon::where('status','<>',2)->where('coupon_code', $code)->exists();

        if($coupon_code == 0){

            Coupon::insert([

                'product_id'    => $request->product_id,
                'coupon_name'   => $request->coupon_name,
                'coupon_code'   => $request->coupon_code,
                'coupon_limit'  => $request->coupon_limit??0,
                'discount'      => $request->discount?? 0,
                'valid_from'    => $request->valid_from,
                'valid_to'      => $request->valid_to,
                'status'        => $request->status,
                'created_at'    => Carbon::now('Asia/Kolkata'),
            ]);

        } else {
            return redirect()->back()->with('error', 'Coupon code exists!' );
        }

        return redirect()->route('coupons.all')->with('success', 'Coupon Added' );
    }

    public function EditCoupon(Request $request)
    {
        $id       = $request->id;
        $products = VariantOptions::where('is_deleted','<>', 1)->get();
        $coupon   = Coupon::findOrFail($id);

        return view('backend.coupons.edit_coupon', compact('products','coupon'));
    }

    public function UpdateCoupon(Request $request, $id)
    {
        $code        =  $request->coupon_code;
        $coupon_code = Coupon::where('status','<>',2)->where('id','<>',$id)->where('coupon_code', $code)->exists();

        if($coupon_code == 0){

            Coupon::findOrFail($id)->update([

                'product_id'    => $request->product_id,
                'coupon_name'   => $request->coupon_name,
                'coupon_code'   => $request->coupon_code,
                'coupon_limit'  => $request->coupon_limit,
                'discount'      => $request->discount?? 0,
                'valid_from'    => $request->valid_from,
                'valid_to'      => $request->valid_to,
                'status'        => $request->status,
                'created_at'    => Carbon::now('Asia/Kolkata'),
            ]);

        } else {
            return redirect()->back()->with('error', 'Coupon code exists!' );
        }
        return redirect()->route('coupons.all')->with('success', 'Coupon Updated' );
    }

    public function DeleteCoupon($id)
    {
        Coupon::findOrFail($id)->update([
            'status'     => 2,
        ]);

        return redirect()->back()->with('error', 'Coupon Removed' );
    }

   public function ApplyCoupon(Request $request)
    {
        $coupon_code    = $request->coupon_code;
        $getid          = Coupon::where('coupon_code', $coupon_code)->pluck('product_id')->first();
        $discount       = Coupon::where('coupon_code', $coupon_code)->pluck('discount')->first();
        $coupon_id      = Coupon::where('coupon_code', $coupon_code)->pluck('id')->first();
        $used_coupons   = Coupon::where('coupon_code', $coupon_code)->pluck('used_coupons')->first();

        $id             = Cart::where('user_id', Auth::id())->where('variant_option_id', $getid)->pluck('id')->first();
        $couponapplied  = Cart::where('user_id', Auth::id())->where('variant_option_id', $getid)->pluck('is_coupon_applied')->first();
        $amount_id      = Cart::where('user_id', Auth::id())->where('variant_option_id', $getid)->pluck('amount_id')->first();
        $amount         = Cart::where('user_id', Auth::id())->where('variant_option_id', $getid)->pluck('amount')->first();
        $quantity       = Cart::where('user_id', Auth::id())->where('variant_option_id', $getid)->pluck('quantity')->first();

        $calculated_p   = $amount * $discount/100;
        $calculated_p1  = $amount - $calculated_p;
        $new_amount     = $calculated_p1 * $quantity;
        $coupon_now     = $used_coupons + 1;
        $total_discount = $calculated_p * $quantity;

        // dd($total_discount);


        //check coupon dates
        $valid_from    = Coupon::where('coupon_code', $coupon_code)->pluck('valid_from')->first();
        $valid_to      = Coupon::where('coupon_code', $coupon_code)->pluck('valid_to')->first();
        $validity      = "";

        if($valid_to != null){
            $date      = $valid_to;
        } else {
            $date      = $valid_from;
        }

        $time       = strtotime($date) + 86400;
        $expiryDate = date('Y-m-d', $time);
        $today      = Carbon::now()->format('Y-m-d');

        if($expiryDate > $today ){
            if($couponapplied != 1) {

                Cart::Where('id',$id)->update([
                    'discount'          => $total_discount,
                    'total_amount'      => $new_amount,
                    'is_coupon_applied' => 1,
                ]);
                Coupon::Where('id',$coupon_id)->update([
                    'used_coupons'      => $coupon_now,
                ]);

            } else {

                return redirect()->back()->with('error', 'Coupon already applied' );
            }
        } else {
            return redirect()->back()->with('error', 'Coupon not exists' );
        }
        return redirect()->back();
    }
}
