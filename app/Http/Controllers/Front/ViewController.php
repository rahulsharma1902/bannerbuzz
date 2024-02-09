<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategories;


class ViewController extends Controller
{
    public function index()
    {
        $product_categories = ProductCategories::whereNull('parent_category')->get();
        $products = Product::latest()->where('status' , true)->take(10)->get();
        return view('front.Dashboard.index',compact('product_categories','products'));
    }

    public function shop()
    {
        return view('front.shop.index');
    }

    public function aboutUs()
    {
        return view('front.about-us.index');
    }

    public function contactUs()
    {
        return view('front.contact-us.index');
    }

    public function privacyPolicy()
    {
        return view('front.privacy-policy.index');
    }

    public function blogs()
    {
        return view('front.blogs.index');
    }
}
