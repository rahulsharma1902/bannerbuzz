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
use App\Models\PrivacyPolicy;
use App\Models\TermsAndConditions;
use App\Models\Testimonial;
use App\Models\AboutUsContent;
use App\Models\ProductAccessories;
use App\Models\Order;
use App\Models\UserOrderDesign;
use App\Models\Contact;
use App\Models\ContactUs;
use App\Mail\MailToAdmin;
use App\Mail\ContactMail;
use App\Mail\ContactUsMail;
use Mail;

use Illuminate\Support\Facades\Validator;
class ViewController extends Controller
{
    //::::::::::: Home page ::::::::::::::::::://
    public function index()
    {
        $testimonials = Testimonial::all();
        $home_content = HomeContent::first();
        $product_categories = ProductCategories::whereNull('parent_category')->get();
        $orders = Order::where('order_status','completed')->orWhere('order_status','succeeded')->get();
        $userDesign_ids = [];

        if ($orders) {
            foreach ($orders as $order) {
                $ids = json_decode($order->user_order_data);
                
                if (is_array($ids)) {
                    $userDesign_ids = array_merge($userDesign_ids, $ids);
                }
            }
            $userDesign_ids = array_unique($userDesign_ids);
        }

        $product_ids = [];
        $accessorie_ids = [];
        foreach($userDesign_ids as $id) {
            $design = UserOrderDesign::find($id);
            if($design->product_type != 'accessorie') {
                $product_ids[] = $design->product_id;
            } else {
                $accessorie_ids[] = $design->product_id;
            }
        }
        $product_ids =  array_unique($product_ids);
        $accessorie_ids =  array_unique($accessorie_ids);

        $loved_products = Product::whereIn('id', $product_ids)->get();
        // $loved_accessories = ProductAccessories::whereIn('id', $accessorie_ids)->get();

        // $loved_products->merge($loved_accessories);


        $products = Product::latest()->where('status', true)->take(10)->get();
        $blogs = Blogs::latest()->where('status', true)->take(4)->get();
        return view('front.Dashboard.index', compact('product_categories', 'products', 'blogs','home_content','testimonials','loved_products'));
    }

    //:::::::::::::: site Pages ::::::::::::::::::://
    public function aboutUs()
    {
        $about_content = AboutUsContent::first();
        return view('front.about-us.index',compact('about_content'));
    }

 

    public function privacyPolicy()
    {
        $privacyPolicy = PrivacyPolicy::first();
        return view('front.privacy-policy.index',compact('privacyPolicy'));
    }
    public function termsAndConditions()
    {
        $termsAndConditions = TermsAndConditions::first();
        return view('front.privacy-policy.termsAndConditions',compact('termsAndConditions'));
    }

    public function uploadArtwork(){
        return view('front.upload-artwork.upload-artwork');
    }

    public function ordertracking(){
        return view('front.order-tracking.order-tracking');
    }

    public function customerReviews(){
        $testimonials = Testimonial::paginate(9);
        // dd($testimonials);
        return view('front.customer-reviews.index',compact('testimonials'));
    }

    public function customerReviewsAdd(Request $req)
    {
        // dd($req->all());
        $req->validate([
            'name' => 'required',
            // 'image' => 'required',
            'rate' => 'required',
            'description' => 'required',
        ]);
        $data = new Testimonial();
        $data->name = $req->name;
        $data->stars = $req->rate;
        $data->description = $req->description;
        if ($req->hasFile('image')) {
            $image = $req->image;
            $filename = 'cust' .time() . '.' . $image->extension();
            $image->move(public_path() . '/Site_Images/', $filename);
            $data->image = $filename;
        }
        $data->save();
        return redirect()->back()->with('success','data added successfully');
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



// Upload ArtWork Form Page


public function uploadArtworkForm()
{
    $homeContent = HomeContent::first();
    return view('front.contact-us.contact-us',compact('homeContent'));
}

public function uploadArtworkFormProcess(Request $request)
{

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:255',
        'orderplace' => 'required|in:ebay,etsy,website', 
        'files.*' => 'nullable|file|max:2048' // Note the 'files.*' for multiple files
    ]);

    $contact = new ContactUs();
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->phone = $request->phone;
    $contact->orderplace = $request->orderplace;
    $contact->orderNumber = $request->orderNumber;

    // Handle multiple files
    if ($request->hasFile('files')) {
        $files = $request->file('files');
        $fileNames = [];

        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = 'report_' . rand(0, 1000) . time() . '.' . $extension;
            $file->move(public_path('ContactReport'), $fileName);
            $fileNames[] = $fileName;
        }

        // Store the file names as a JSON encoded string
        $contact->images = json_encode($fileNames);
    }

    $contact->save();

    $homeContent = HomeContent::first();
    if ($homeContent) {
        $mail = $homeContent->email;
        if ($mail) {
            Mail::to($mail)->send(new ContactUsMail($contact));
            // Mail::to('tecrdx@gmail.com')->send(new ContactUsMail($contact));
        }
    }

    return redirect()->back()->with('success', 'Your inquiry has been submitted successfully!');
}

// contact us page view and form submit 
public function contactUs()
{
    $homeContent = HomeContent::first();
    return view('front.contact-us.index',compact('homeContent'));
    // return view('front.contact-us.contact-us',compact('homeContent'));
}
public function ContactProcess(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'topic' => 'required|string|max:255',
        'subject' => 'required|string|max:255',
        'inquiry' => 'required|string|max:1000', 
    ]);

    $contact = new Contact();
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->state = $request->state;
    $contact->number = $request->number;
    $contact->company = $request->company;
    $contact->address = $request->address;
    $contact->country = $request->country;
    $contact->city = $request->city;
    $contact->topic = $request->topic;
    $contact->subject = $request->subject;
    $contact->inquiry = $request->inquiry;
    $contact->save();
    $details = $request->all();
    // Mail::to('tecrdx@gmail.com')->send(new ContactMail($details));
    $homeContent = HomeContent::first();
    if ($homeContent) {
        $mail = $homeContent->email;
        if ($mail) {
            Mail::to($mail)->send(new ContactMail($contact));
            // Mail::to('tecrdx@gmail.com')->send(new ContactMail($contact));
        }
    }
    return redirect()->back()->with('success', 'Your inquiry has been submitted successfully!');
}


}
