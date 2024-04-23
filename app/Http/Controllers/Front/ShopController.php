<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\MailToAdmin;
use App\Models\AccessoriesType;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Template;
use App\Models\ProductAccessories;
use App\Models\ProductCategories;
use Illuminate\Support\Facades\Mail;
use Illuminate\Pagination\LengthAwarePaginator;


class ShopController extends Controller
{
    //:::::::::::::::::::::: Shop :::::::::::::::::::://
    public function shop($slug)
    {
        $cat = ProductCategories::where('slug', $slug)->first();
        if ($cat) {
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
            return view('front.shop.index', compact('category', 'products', 'allproducts'));
        } else {
            return redirect()->back();
        }
    }

    //:::::::::::::::::: Product Details ::::::::::::::::::::://
    public function ProductDetails(Request $request, $slug)
    {

        $product = Product::where('slug', $slug)->first();
        $templates = Template::with('category')->get();
        if ($product) {
            $selected_size = $request->input('size');
            $selected_size_unit = $request->input('sizeUnit');
            $selected_qty = $request->input('quantity');
            $related_product = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
            return view('front.shop.product_details', compact('templates','product', 'related_product', 'selected_size', 'selected_size_unit', 'selected_qty'));
        } else {
            return redirect()->back();
        }

    }

    //::::::::::: getting data by ajax :::::::::::::::://
    public function getChildCategories($parent_id)
    {
        $childCategories = ProductCategories::where('parent_category', $parent_id)->get();
        return response()->json($childCategories);
    }

    public function getCategoryProducts($category_id)
    {
        $category = ProductCategories::with('products', 'subCategories.products')->find($category_id);
        $products = $category->products;
        if($category->parent){
            $parent = $category->parent;
            $products = $products->merge($parent->products);
        }
        foreach ($category->subCategories as $subCategory) {
            $products = $products->merge($subCategory->products);
        }
        return response()->json($products);
    }

    public function getsizes($id)
    {
        $product = Product::find($id);
        return response()->json($product->sizes);
    }
    //::::::::::::::::::::::::::::::::::::::::::::::::::::::://

    //:::::::::: product accessories functions ::::::::::::::::://
    public function accessories()
    {
        $product_accessories = ProductAccessories::paginate(9);
        $product_accessoriesType = AccessoriesType::all();
        return view('front.shop.accessories', compact('product_accessoriesType', 'product_accessories'));
    }

    public function AccessoriesDetails(Request $request, $slug)
    {
        $product = ProductAccessories::where('slug', $slug)->first();
        if ($product) {
            $selected_size = $request->input('size');
            $selected_size_unit = $request->input('sizeUnit');
            $selected_qty = $request->input('quantity');
            $related_product = ProductAccessories::where('accessories_type', $product->accessories_type)->where('id', '!=', $product->id)->get();
            return view('front.shop.accessories_details', compact('product', 'related_product', 'selected_size', 'selected_size_unit', 'selected_qty'));
        } else {
            return redirect()->back();
        }
    }

    public function getaccessoriessizes($id)
    {
        $product = ProductAccessories::find($id);
        return response()->json($product->sizes);
    }

    //specialoffers 
    public function specialoffers(){
        return view('front.shop.special-offers.special-offers');
    }
}
