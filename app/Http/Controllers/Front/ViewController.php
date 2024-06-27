<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Blogs;
use App\Models\Product;
use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Models\ProductCategories;
use App\Models\HomeContent;
use App\Models\Testimonial;
use App\Models\AboutUsContent;
use App\Models\ProductAccessories;
use App\Mail\MailToAdmin;
use Illuminate\Support\Facades\Validator;
class ViewController extends Controller
{
    //::::::::::: Home page ::::::::::::::::::://
    public function index()
    {
        $testimonials = Testimonial::all();
        $home_content = HomeContent::first();
        $product_categories = ProductCategories::whereNull('parent_category')->get();
        $products = Product::latest()->where('status', true)->take(10)->get();
        $blogs = Blogs::latest()->where('status', true)->take(4)->get();
        return view('front.Dashboard.index', compact('product_categories', 'products', 'blogs','home_content','testimonials'));
    }

    //:::::::::::::: site Pages ::::::::::::::::::://
    public function aboutUs()
    {
        $about_content = AboutUsContent::first();
        return view('front.about-us.index',compact('about_content'));
    }

    public function contactUs()
    {
        return view('front.contact-us.index');
    }

    public function privacyPolicy()
    {
        return view('front.privacy-policy.index');
    }

    public function uploadArtwork(){
        return view('front.upload-artwork.upload-artwork');
    }

    public function ordertracking(){
        return view('front.order-tracking.order-tracking');
    }

    public function customerReviews(){
        $testimonials = Testimonial::paginate(9);
        return view('front.customer-reviews.index',compact('testimonials'));
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
            $blogs = Blogs::where('status',true)->orderBy('created_at', 'desc')->paginate(8);
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
            $allblogs = Blogs::all();

            return view('front.blogs.blog_details', compact('blog', 'blog_category', 'related_blogs','allblogs'));
        } else {
            return redirect()->back();
        }
    }
    //*******************************Search product***********************//

    public function searchProduct(Request $request){
        $search = $request->search;
        $products = Product::where('name', 'like', "%$search%")->get();
        $accessories = ProductAccessories::where('name', 'like', "%$search%")->get();
        $products = $products->merge($accessories);
        return view('front.shop.search',compact('products'));
    }

public function emailnotify(Request $request)
{
    $request->validate([
        'email' =>'required',
    ]);
    $user = new Visitor();
    $user->user_email = $request->email;
    $user->save();

    return response()->json($user);

}

public function ContactProcess(Request $request)
{
    // dd($request->all());
    $validator = Validator::make($request->all(), [
        'name'        =>    'required',
        'email'       =>    'required|email|unique',
        'number'      =>    'required',
        'company_name'=>    'required',
        'address'     =>    'required',
        'state'       =>    'required',
        'city'        =>    'required',
        'email_topic' =>    'required',
        'subject'     =>    'required',
        'inquiry'     =>    'required',
        // Add more validation rules as needed
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422); // Return validation errors
    }

    // $email = $request->email;

}


}
