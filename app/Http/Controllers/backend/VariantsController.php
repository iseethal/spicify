<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use App\Models\Category;

use App\Models\Variants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class VariantsController extends Controller
{
    public function AllVariants()
    {
        $variants = Variants::where('is_deleted','<>', 1)->orderBy('id','desc')->get();
        return view('backend.variants.all_variants', compact('variants'));
    }

    public function AddVariant()
    {
        $categories = Category::where('is_deleted','<>', 1)->where('is_active','=', 1)->get();
        return view('backend.variants.add_variant', compact('categories'));
    }

    public function StoreVariant(Request $request)
    {
        Variants::insert([

            'category_id' => $request->category_id,
            'name'        => $request->name,
            'is_active'   => $request->is_active,
        ]);

        return redirect()->route('variants.all')->with('success', 'Variant Added' );
    }

    public function EditVariant(Request $request)
    {
        $id        = $request->id;
        $variants  = Variants::findOrFail($id);
        $categories = Category::where('is_deleted','<>', 1)->where('is_active','=', 1)->get();


        return view('backend.variants.edit_variant', compact('variants', 'categories'));
    }

    public function UpdateVariant(Request $request, $id)
    {
        Variants::findOrFail($id)->update([

            'category_id'   => $request->category_id,
            'name'      	=> $request->name,
            'is_active' 	=> $request->is_active,
        ]);

        return redirect()->route('variants.all')->with('success', 'Variant Updated' );
    }

    public function DeleteVariant($id)
    {
        Variants::findOrFail($id)->update([

            'is_deleted'     => 1,
        ]);

        return redirect()->back()->with('error', 'Variant Removed');
    }
}
