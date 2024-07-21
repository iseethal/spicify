<?php

namespace App\Http\Controllers\backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{

    public function AllSlider()
    {
        $sliders = Slider::where('is_active','=', 1)->get();

        return view('backend.sliders.all_sliders', compact('sliders'));
    }

    public function AddSlider()
    {
        return view('backend.sliders.add_slider');
    }

    public function StoreSlider(Request $request)
    {
        // dd( $request->description);
        if($request->file('image')!= null){
            $file       = $request->file('image');
            $filename   = $file->getClientOriginalName();
            $request->image->move(public_path('backend/images/slider'),$filename);
            $path       = "public/backend/images/slider/$filename";
        }
        else{
            $filename = "";
        }

        Slider::insert([

            'title'       => $request->title?? "",
            'description' => $request->description?? "",
            'link'        => $request->link?? "",
            'image'       => $filename,
            'is_active'   => $request->is_active,
        ]);

        return redirect()->route('slider.all')->with('success', 'Slider Added' );
    }

    public function EditSlider(Request $request)
    {
        $id         = $request->id;
        $slider    = Slider::findOrFail($id);

        return view('backend.sliders.edit_slider', compact('slider'));
    }

    public function UpdateSlider(Request $request, $id)
    {

        $id      = $request->id;
        $slider  = Slider::findOrFail($id);

        if($request->file('image')!= null){

            $imagePath = public_path('backend/images/slider/'.$slider->image);

            if($slider->image != null){
                unlink($imagePath);
            }

            $file       = $request->file('image');
            $filename   = $file->getClientOriginalName();
            $request->image->move(public_path('backend/images/slider'),$filename);
            $path       = "public/backend/images/slider/$filename";
        }
        $image  = Slider::where('id',$id)->pluck('image')->first();

        Slider::findOrFail($id)->update([

            'title'       => $request->title,
            'description' => $request->description?? "",
            'link'        => $request->link?? "",
            'image'       => $filename?? $image,
            'is_active'   => $request->is_active,
        ]);

        return redirect()->route('slider.all')->with('success', 'Slider Updated' );
    }

    public function DeleteSlider($id)
    {
        Slider::findOrFail($id)->update([

            'is_active'     => 2,
        ]);

        return redirect()->back()->with('error', 'Slider Removed' );
    }
}
