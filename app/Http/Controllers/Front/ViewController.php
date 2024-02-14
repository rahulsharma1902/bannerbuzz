<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Blogs;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategories;


class ViewController extends Controller
{
    public function index()
    {
        $product_categories = ProductCategories::whereNull('parent_category')->get();
        $products = Product::latest()->where('status', true)->take(10)->get();
        $blogs = Blogs::latest()->where('status', true)->take(4)->get();
        return view('front.Dashboard.index', compact('product_categories', 'products','blogs'));
    }

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

    public function blogs($slug = null)
    {
        $blog_cat = BlogCategory::where('slug', $slug)->first();
        if ($blog_cat) {
            $blogs = Blogs::where('blog_category_id', $blog_cat->id)->get();
            $blog_category = BlogCategory::where('id', '!=', $blog_cat->id)->get();
            return view('front.blogs.index', compact('blogs', 'blog_category'));
        } else {
            $blogs = Blogs::orderBy('created_at', 'desc')->get();
            $blog_category = BlogCategory::all();
            $latest_blogs = Blogs::latest()->where('status', true)->take(10)->get();
            return view('front.blogs.index', compact('blogs', 'blog_category', 'latest_blogs'));
        }
    }

    public function blogDetails($slug)
    {
        $blog = Blogs::where('slug', $slug)->first();
        $blog_category = BlogCategory::all();
        $related_blogs = Blogs::where('blog_category_id', $blog->blog_category_id)->take(5)->get();

        return view('front.blogs.blog_details', compact('blog', 'blog_category', 'related_blogs'));
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
}
