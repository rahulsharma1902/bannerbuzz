<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccessoriesType;
use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    public function addProduct($slug = null)
    {
        $product = Product::where('slug',$slug)->first();
        $categories = ProductCategories::all();
        $product_types = ProductType::all();
        $accessories_type = AccessoriesType::all();
        return view('admin.products.add',compact('product','categories','product_types','accessories_type'));
    }

}
