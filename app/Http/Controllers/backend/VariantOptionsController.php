<?php

namespace App\Http\Controllers\backend;

use App\Models\VariantOptions;
use App\Models\Category;
use App\Models\ProductAmountOptions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VariantOptionsController extends Controller
{
    public function AllVariantOptions()
    {
        $variant_options = VariantOptions::where('is_deleted','<>', 1)->get();
        return view('backend.variant_options.all_variant_options', compact('variant_options'));
    }

    public function AddVariantOption()
    {
        $categories = Category::where('is_deleted','<>', 1)->where('is_active','=', 1)->get();
        return view('backend.variant_options.add_variant_option', compact('categories'));
    }

    public function StoreVariantOption(Request $request)
    {

        if($request->file('image')!= null){
            $file       = $request->file('image');
            $filename   = $file->getClientOriginalName();
            $request->image->move(public_path('backend/images/product_images'),$filename);
            $path       = "public/backend/images/product_images/$filename";
        }
        else{
            $filename = "";
        }

        // support_image1
        if($request->file('support_image1')!= null){
            $file             = $request->file('support_image1');
            $support_image1   = $file->getClientOriginalName();
            $request->support_image1->move(public_path('backend/images/product_images'),$support_image1);
            $path             = "public/backend/images/product_images/$support_image1";
        }
        else{
            $support_image1 = "";
        }

        // support_image2
        if($request->file('support_image2')!= null){
            $file             = $request->file('support_image2');
            $support_image2   = $file->getClientOriginalName();
            $request->support_image2->move(public_path('backend/images/product_images'),$support_image2);
            $path             = "public/backend/images/product_images/$support_image2";
        }
        else{
            $support_image2 = "";
        }

        // support_image3
        if($request->file('support_image3')!= null){
            $file             = $request->file('support_image3');
            $support_image3   = $file->getClientOriginalName();
            $request->support_image3->move(public_path('backend/images/product_images'),$support_image3);
            $path             = "public/backend/images/product_images/$support_image3";
        }
        else{
            $support_image3 = "";
        }

        // support_image4
        if($request->file('support_image4')!= null){
            $file             = $request->file('support_image4');
            $support_image4   = $file->getClientOriginalName();
            $request->support_image4->move(public_path('backend/images/product_images'),$support_image4);
            $path             = "public/backend/images/product_images/$support_image4";
        }
        else{
            $support_image4 = "";
        }

        $product_id = VariantOptions::insertGetId([

            'category_id'     => $request->category_id,
            'name'            => $request->name,
            'image'           => $filename?? "",
            'support_image1'  => $support_image1?? "",
            'support_image2'  => $support_image2?? "",
            'support_image3'  => $support_image3?? "",
            'support_image4'  => $support_image4?? "",
            'description'     => $request->description?? "",
            'is_featured'     => $request->is_featured?? 0,
            'is_active'       => $request->is_active,
        ]);
        
        // INSERTING PRODUCT AMOUNT OPTIONS
        $row_cnt     = $request->row_cnt;

        if($row_cnt != null){
            for ($i=1; $i < $row_cnt; $i++) { 

                $qty_name     = 'qty_name_'.$i;
                $amount       = 'amount_'.$i;
 
                $qty_name_is  = $request->$qty_name; 
                $amount_is    = $request->$amount;

                if($qty_name_is != null && $amount_is!= null) {

                    ProductAmountOptions::insert([

                        'product_id'    => $product_id,
                        'qty_name'      => $qty_name_is,
                        'amount'        => $amount_is,             
                    ]);
                }
            }
        }
        // ENDS
        return redirect()->route('variant_options.all')->with('success', 'Product Added' );
    }

    public function EditVariantOption(Request $request)
    {
        $id        		        = $request->id;
        $variant_options        = VariantOptions::findOrFail($id);
        $categories             = Category::where('is_deleted','<>', 1)->where('is_active','=', 1)->get();
        $product_amount_options = ProductAmountOptions::where('is_deleted','<>', 1)->where('product_id','=', $id)->get();

        return view('backend.variant_options.edit_variant_option', compact('variant_options', 'categories', 'product_amount_options'));
    }

    public function UpdateVariantOption(Request $request, $id)
    {
        $id        		  = $request->id;
        $variant_options  = VariantOptions::findOrFail($id);

        if(request()->hasFile('image') && request('image') != ''){

            // $imagePath = public_path('backend/images/product_images/'.$variant_options->image);
            // if($variant_options->image != null ){
            //     unlink($imagePath);
            // }
            $file       = $request->file('image');
            $filename   = $file->getClientOriginalName();
            $request->image->move(public_path('backend/images/product_images'),$filename);
            $path       = "public/backend/images/product_images/$filename";
        }

        // support_image1
        if(request()->hasFile('support_image1') && request('support_image1') != ''){

            $imagePath1 = public_path('backend/images/product_images/'.$variant_options->support_image1);
            // if($variant_options->support_image1 != null){
            //     unlink($imagePath1);
            // }

            $file             = $request->file('support_image1');
            $support_image1   = $file->getClientOriginalName();
            $request->support_image1->move(public_path('backend/images/product_images'),$support_image1);
            $path             = "public/backend/image/product_images/$support_image1";
        }

        // support_image2
        if(request()->hasFile('support_image2') && request('support_image2') != ''){

            $imagePath2 = public_path('backend/images/product_images/'.$variant_options->support_image2);
            // if($variant_options->support_image2 != null){
            //     unlink($imagePath2);
            // }

            $file             = $request->file('support_image2');
            $support_image2   = $file->getClientOriginalName();
            $request->support_image2->move(public_path('backend/images/product_images'),$support_image2);
            $path             = "public/backend/image/product_images/$support_image2";
        }

        // support_image3
        if(request()->hasFile('support_image3') && request('support_image3') != ''){

            $imagePath3 = public_path('backend/images/product_images/'.$variant_options->support_image3);
            // if($variant_options->support_image3 != null){
            //     unlink($imagePath3);
            // }

            $file             = $request->file('support_image3');
            $support_image3   = $file->getClientOriginalName();
            $request->support_image3->move(public_path('backend/images/product_images'),$support_image3);
            $path             = "public/backend/image/product_images/$support_image3";
        }

        // support_image4
        if(request()->hasFile('support_image4') && request('support_image4') != ''){

            $imagePath4 = public_path('backend/images/product_images/'.$variant_options->support_image4);
            // if($variant_options->support_image4 != null ){
            //     unlink($imagePath4);
            // }

            $file             = $request->file('support_image4');
            $support_image4   = $file->getClientOriginalName();
            $request->support_image4->move(public_path('backend/images/product_images'),$support_image4);
            $path             = "public/backend/image/product_images/$support_image4";
        }

        $image   = VariantOptions::where('id',$id)->pluck('image')->first();
        $image1  = VariantOptions::where('id',$id)->pluck('support_image1')->first();
        $image2  = VariantOptions::where('id',$id)->pluck('support_image2')->first();
        $image3  = VariantOptions::where('id',$id)->pluck('support_image3')->first();
        $image4  = VariantOptions::where('id',$id)->pluck('support_image4')->first();

        VariantOptions::findOrFail($id)->update([

            'category_id'    => $request->category_id,
            'name'           => $request->name,
            'image'          => $filename?? $image,
            'support_image1' => $support_image1??$image1,
            'support_image2' => $support_image2??$image2,
            'support_image3' => $support_image3??$image3,
            'support_image4' => $support_image4??$image4,
            'description'    => $request->description?? "",
            'is_featured'    => $request->is_featured ?? 0,
            'is_active'      => $request->is_active,
        ]);

        // INSERTING PRODUCT AMOUNT OPTIONS
        $product_amount_options = ProductAmountOptions::where('product_id', $id)->where('is_deleted', '0')->get();

        if ($product_amount_options) {

            foreach ($product_amount_options as $item){

                $amount_id    = $item->id;
                $qty_name     = 'qty_name_'.$amount_id;
                $amount       = 'amount_'.$amount_id;
                $qty_name_is  = $request->$qty_name; 
                $amount_is    = $request->$amount;

                if($qty_name_is != null && $amount_is!= null) {

                    ProductAmountOptions::findOrFail($amount_id)->update([
                        'product_id'    => $id,
                        'qty_name'      => $qty_name_is,
                        'amount'        => $amount_is, 
                    ]);
                }
            }
            // ProductAmountOptions::where('product_id', $id)->delete();
        }

        $row_cnt     = $request->row_cnt;
        if($row_cnt != null){
            for ($i=1; $i < $row_cnt; $i++) { 

                $qty_name     = 'qty_name_'.$i;
                $amount       = 'amount_'.$i;
 
                $qty_name_is  = $request->$qty_name; 
                $amount_is    = $request->$amount;

                if($qty_name_is != null && $amount_is!= null) {

                    ProductAmountOptions::insert([
                        'product_id'    => $id,
                        'qty_name'      => $qty_name_is,
                        'amount'        => $amount_is,             
                    ]);
                }
            }
        }
        // ENDS

        // return redirect()->back();
        return redirect()->route('variant_options.all')->with('success', 'Product Updated' );
    }

    public function DeleteVariantOption($id)
    {
        VariantOptions::findOrFail($id)->update([
            'is_deleted'     => 1,
        ]);

        // ProductAmountOptions::where('product_id',  $id)->delete();
        return redirect()->back()->with('error', 'Product Removed' );
    }

    public function DeleteAmountOption($id)
    {
        ProductAmountOptions::findOrFail($id)->update([
            'is_deleted'     => 1,
        ]);
        return redirect()->back()->with('error', 'Amount Option Removed' );
    }
}