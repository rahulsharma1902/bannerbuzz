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
    //::::::::::: Home page ::::::::::::::::::://
    public function index()
    {
        $product_categories = ProductCategories::whereNull('parent_category')->get();
        $products = Product::latest()->where('status', true)->take(10)->get();
        $blogs = Blogs::latest()->where('status', true)->take(4)->get();
        return view('front.Dashboard.index', compact('product_categories', 'products', 'blogs'));
    }

    //:::::::::::::: site Pages ::::::::::::::::::://
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
    //:::::::::::::::::::::::::::::::::::::::::::::::://

    //:::::::::::::::: Blogs ::::::::::::::::::::::::://
    public function blogs($slug = null)
    {
        $category = BlogCategory::where('slug', $slug)->first();
        if ($category) {
            $blogs = Blogs::where('blog_category_id', $category->id)->paginate(8);
            $blog_category = BlogCategory::where('id', '!=', $category->id)->get();
            return view('front.blogs.index', compact('blogs', 'blog_category', 'category'));
        } else {
            $blogs = Blogs::orderBy('created_at', 'desc')->paginate(8);
            $blog_category = BlogCategory::all();
            $latest_blogs = Blogs::latest()->where('status', true)->take(10)->get();
            return view('front.blogs.index', compact('blogs', 'blog_category', 'latest_blogs'));
        }
    }
    public function blogDetails($slug)
    {
        $blog = Blogs::where('slug', $slug)->first();
        if ($blog) {
            $blog_category = BlogCategory::all();
            $related_blogs = Blogs::where('blog_category_id', $blog->blog_category_id)->take(5)->get();

            return view('front.blogs.blog_details', compact('blog', 'blog_category', 'related_blogs'));
        } else {
            return redirect()->back();
        }
    }
}
