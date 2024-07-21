<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //

    public function AllCategory()
    {
        $categories = Category::where('is_deleted','<>', 1)->OrderBy('id','desc')->get();
        return view('backend.category.all_category', compact('categories'));
    }

    public function AddCategory()
    {
        return view('backend.category.add_category');
    }

    public function StoreCategory(Request $request)
    {
        if($request->file('image')!= null){
            $file       = $request->file('image');
            $filename   = $file->getClientOriginalName();
            $request->image->move(public_path('backend/image/category'),$filename);
            $path       = "public/backend/image/category/$filename";
        }
        else{
            $filename = "";
        }

        Category::insert([

            'category_name' => $request->category_name,
            'image'         => $filename?? "",
            'is_active'     => $request->is_active,
        ]);

        return redirect()->route('category.all')->with('success', 'Category added' );
    }

    public function EditCategory(Request $request)
    {
        $id        = $request->id;
        $category  = Category::findOrFail($id);

        return view('backend.category.edit_category', compact('category'));
    }

    public function UpdateCategory(Request $request, $id)
    {
        $id        = $request->id;
        $category  = Category::findOrFail($id);


        if($request->file('image')!= null){

            $imagePath = public_path('backend/image/category/'.$category->image);

            if($category->image != null){
                unlink($imagePath);
            }

            $file       = $request->file('image');
            $filename   = $file->getClientOriginalName();
            $request->image->move(public_path('backend/image/category'),$filename);
            $path       = "public/backend/image/category/$filename";
        }

        $image  = category::where('id',$id)->pluck('image')->first();

        Category::findOrFail($id)->update([

            'category_name' => $request->category_name,
            'image'         => $filename?? $image,
            'is_active'     => $request->is_active,
        ]);

        return redirect()->route('category.all')->with('success', 'Category updated' );
    }

    public function DeleteCategory($id)
    {
        Category::findOrFail($id)->update([

            'is_deleted'     => 1,
        ]);

        return redirect()->back()->with('error', 'Category Removed' );
    }

}
