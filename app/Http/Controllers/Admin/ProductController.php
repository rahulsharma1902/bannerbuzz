<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategories;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function ProductType()
    {
        $categories = ProductCategories::all();
        $product_type = ProductType::all();
        return view('admin.product_type.index',compact('categories','product_type'));
    }

    public function AddProductType(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:product_types',
            
        ]);
        $product_type = new ProductType();
        $product_type->name = $request->name;
        $product_type->slug = $request->slug;
        $product_type->category_id = $request->category;
        $product_type->save();

        return redirect()->back()->with('success','product Type added successfully');
    }

    public function removeProductType($id)
    {
        $product_type = ProductType::find($id);
        if($product_type) {
            $product_type->delete();
            return redirect()->back()->with('success','product Type deleted successfully');
        } else {
            return redirect()->back()->with('error','Invalid product type for deletion');
        }
    }
}
