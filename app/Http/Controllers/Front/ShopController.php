<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategories;


class ShopController extends Controller
{
    public function shop($slug)
    {
        $cat = ProductCategories::where('slug',$slug)->first();
        $category = ProductCategories::with('products','subCategories.products')->find($cat->id);

        $products = $category->products;

        foreach ($category->subCategories as $subCategory) {
            $products = $products->merge($subCategory->products);
        }
        return view('front.shop.index', compact('category','products'));
    }

    public function ProductDetails($slug)
    {
        $product = Product::where('slug',$slug)->first();
        $related_product = Product::where('category_id',$product->category->id)->where('id' ,'!=',$product->id)->get();
        return view('front.shop.product_details',compact('product','related_product'));
    }
    public function getChildCategories($parent_id)
    {
        $childCategories = ProductCategories::where('parent_category', $parent_id)->get();
        return response()->json($childCategories);
    }

    public function getCategoryProducts($category_id)
    {
        $products = Product::where('category_id', $category_id)->get();
        return response()->json($products);
    }

    public function getsizes($id){
        $product = Product::find($id);
        return response()->json($product->sizes);
    }

    public function CustomProduct(Request $request){
        $product = Product::find($request->product_id);

    //   return view('front.shop.product_details',compact())
    }
}
