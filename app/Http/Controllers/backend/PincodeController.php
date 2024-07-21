<?php

namespace App\Http\Controllers\backend;

use App\Models\Pincode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PincodeController extends Controller
{
    public function AllPincodes()
    {
        $pincode = Pincode::where('is_deleted','<>', 1)->get();
        return view('backend.pincodes.all_pincodes', compact('pincode'));
    }

    public function AddPincode()
    {
        return view('backend.pincodes.add_pincode');
    }

    public function StorePincode(Request $request)
    {
        Pincode::insert([
            'pincode'   => $request->pincode,
            'is_active' => $request->is_active,
        ]);
        return redirect()->route('pincodes.all')->with('success', 'Pincode added');
    }

    public function EditPincode(Request $request)
    {
        $id        = $request->id;
        $pincode   = Pincode::findOrFail($id);
        return view('backend.pincodes.edit_pincode', compact('pincode'));
    }

    public function UpdatePincode(Request $request, $id)
    {
        $id        = $request->id;

        Pincode::findOrFail($id)->update([
            'pincode'     => $request->pincode,
            'is_active'   => $request->is_active,
        ]);
        return redirect()->route('pincodes.all')->with('success', 'Pincode updated');
    }

    public function DeletePincode($id)
    {
        Pincode::findOrFail($id)->update([
            'is_deleted'     => 1,
        ]);
        return redirect()->back()->with('error', 'Pincode Removed');
    }

    public function AddPincodeinBulk(Request $request)
    {
        $get_result_arr = json_decode($request->getContent(), true);
        $is_active = '1';

        foreach ($get_result_arr as $value) {

            // $State      = $value["State"];
            $State      = "New Delhi";
            $District   = $value["District"];
            $Location   = $value["Area"];
            $Pincode    = $value["Pincode"];
            // $Area      = $value["Area"];

            Pincode::insert([
                'pincode'   => $Pincode,
                'state'     => $State,
                'district'  => $District,
                'location'   => $Location,
                'is_active' => $is_active,
            ]); 
        }
        return response()->json(['response' => 'success']);    
    }
}