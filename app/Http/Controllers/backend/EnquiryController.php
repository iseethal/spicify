<?php

namespace App\Http\Controllers\backend;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class EnquiryController extends Controller
{
    public function AllEnquiries()
    {
        $enquiries = Enquiry::where('is_deleted','<>',1)->get();

        return view('backend.enquiry.enquiries', compact('enquiries'));
    }

    public function ViewEnquiries(Request $request)
    {
        $id      = $request->id;
        $enquiry = Enquiry::findOrFail($id);

        return view('backend.enquiry.view_enquiries', compact('enquiry'));
    }

    public function UpdateStatus(Request $request, $id)
    {
        Enquiry::findOrFail($id)->update([

            'status'     => $request->status,
        ]);

        return redirect()->route('enquiry.all')->with('success', 'Enquiry status updated' );
    }

    public function DeleteEnquiry($id)
    {
        Enquiry::findOrFail($id)->update([

            'is_deleted'     => 1,
        ]);

        return redirect()->back()->with('error', 'Slider Removed' );
    }


    public function Enquiries(Request $request)
    {

        $variant_option_id = $request->variant_option_id;
        $type              = $request->type;
        $productname       = $request->productname;

        $url = "https://api.whatsapp.com/send/?phone=919961492022&text=Hi,%20Kriztle%20I'm%20interested%20to%20buy%20your%20product%20 $productname";

        if($type  == 1){
            Enquiry::insert([

                'variant_option_id'  => $request->variant_option_id,
                'name'               => $request->name?? "",
                'type'               => $request->type,
                'email'              => $request->email?? "",
                'mobile'             => $request->mobile?? "",
                'address'            => $request->address?? "",
                'status'             => 1,
                'created_at'         => Carbon::now('Asia/Kolkata'),


            ]);

            if(Auth::id()){

                Enquiry::insert([

                    'variant_option_id'  => $request->variant_option_id,
                    'name'               => Auth::user()->name,
                    'type'               => $request->type,
                    'email'              => Auth::user()->email,
                    'mobile'             => $request->mobile?? "",
                    'address'            => $request->address?? "",
                    'status'             => 1,
                    'created_at'         => Carbon::now('Asia/Kolkata'),


                ]);


            }

            return Redirect::to($url);
        } else {

            Enquiry::insert([

                'variant_option_id'  => $request->variant_option_id,
                'name'               => $request->name?? "",
                'type'               => 0,
                'email'              => $request->email?? "",
                'mobile'             => $request->mobile?? "",
                'address'            => $request->address?? "",
                'status'             => 1,
                'created_at'         => Carbon::now('Asia/Kolkata'),


            ]);

        return redirect()->back()->with('message','Form submitted successfully');

        }


    }

    public function EditEnquiry(Request $request)
    {
        $id      = $request->id;
        $enquiry = Enquiry::findOrFail($id);

        return view('backend.enquiry.edit_enquiry', compact('enquiry'));
    }

    public function UpdateEnquiry(Request $request, $id)
    {
        Enquiry::findOrFail($id)->update([

            'name'               => $request->name?? "",
            'email'              => $request->email?? "",
            'mobile'             => $request->mobile?? "",
            'address'            => $request->address?? "",

        ]);

        return redirect()->route('enquiry.all')->with('message','enquiry updated successfully');

    }


}
