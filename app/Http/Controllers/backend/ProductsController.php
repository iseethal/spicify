<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{

    public function AllProducts()
    {
        $products = Product::where('is_deleted','<>', 1)->get();
        return view('backend.products.all_products', compact('products'));
    }

    public function AddProduct()
    {
        $categories = Category::where('is_active','=', 1)->where('is_deleted','<>',1)->get();
        return view('backend.products.add_product', compact('categories'));
    }

    public function StoreProduct(Request $request)
    {
        Product::insert([

            'category_id'  => $request->category_id,
            'product_name' => $request->product_name,
            'is_active'    => $request->is_active,
        ]);

        return redirect()->route('products.all')->with('success', 'Product Added' );
    }

    public function EditProduct(Request $request)
    {
        $id         = $request->id;
        $products   = Product::findOrFail($id);
        $categories = Category::where('is_deleted','<>', 1)->get();

        return view('backend.products.edit_product', compact('products', 'categories'));
    }

    public function UpdateProduct(Request $request, $id)
    {
        Product::findOrFail($id)->update([

            'category_id'   => $request->category_id,
            'product_name'  => $request->product_name,
            'is_active'     => $request->is_active,
        ]);

        return redirect()->route('products.all')->with('success', 'Product Updated' );
    }

    public function DeleteProduct($id)
    {
        Product::findOrFail($id)->update([

            'is_deleted'     => 1,
        ]);

        return redirect()->back()->with('success', 'Product Removed' );
    }
}
