<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\MailToAdmin;
use App\Models\AccessoriesType;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductAccessories;
use App\Models\ProductCategories;
use Illuminate\Support\Facades\Mail;
use Illuminate\Pagination\LengthAwarePaginator;


class ShopController extends Controller
{
    public function shop($slug)
    {

        $cat = ProductCategories::where('slug', $slug)->first();
        if($cat){
        $category = ProductCategories::with('products', 'subCategories.products')->find($cat->id);
        $allproducts = $category->products;

        foreach ($category->subCategories as $subCategory) {
            $allproducts = $allproducts->merge($subCategory->products);
        }
        $perPage = 9; 
        $page = request()->get('page', 1); 
        $products = new LengthAwarePaginator(
            $allproducts->forPage($page, $perPage),
            $allproducts->count(),
            $perPage,
            $page,
            ['path' => url()->current()]
        );
        return view('front.shop.index', compact('category', 'products','allproducts'));
    }else {
        return redirect()->back();
    }
    }

    public function ProductDetails($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if($product){
            $related_product = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
            return view('front.shop.product_details', compact('product', 'related_product'));
        }else {
            return redirect()->back();
        }

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

    public function getsizes($id)
    {
        $product = Product::find($id);
        return response()->json($product->sizes);
    }

    public function CustomProduct(Request $request)
    {
        $product = Product::find($request->product_id);

        //   return view('front.shop.product_details',compact())
    }

    // product accessories functions 
    public function accessories()
    {
        $product_accessories = ProductAccessories::paginate(9);
        $product_accessoriesType = AccessoriesType::all();
        return view('front.shop.accessories', compact('product_accessoriesType', 'product_accessories'));
    }

    public function AccessoriesDetails($slug)
    {
        $product = ProductAccessories::where('slug', $slug)->first();
        $related_product = ProductAccessories::where('accessories_type', $product->accessories_type)->where('id', '!=', $product->id)->get();
        return view('front.shop.accessories_details', compact('product', 'related_product'));
    }

    public function getaccessoriessizes($id)
    {
        $product = ProductAccessories::find($id);
        return response()->json($product->sizes);
    }

    // public function sendMail(Request $request){
    //     $request->validate([
    //        'name' => 'required',
    //        'email' => 'required',
    //        'number' => 'required',
    //        'company_name' => 'required'
    //     ]);

    //     $maildata = [
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'number' => $request->number,
    //         'company_name' => $request->company_name
    //     ];
    //     Mail::to('developer1234556@gmail.com')->send(new MailToAdmin($maildata));

    //     return redirect()->back();
    // }
}
