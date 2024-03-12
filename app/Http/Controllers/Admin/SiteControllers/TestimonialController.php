<?php

namespace App\Http\Controllers\Admin\SiteControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index(){
        $testimonials = Testimonial::all();
        return view('admin.site_content.testimonials.index',compact('testimonials'));
    }

    public function Addprocc(Request $req){
        $req->validate([
            'name' => 'required',
            'image' => 'required',
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

    public function remove($id){
        $data = Testimonial::find($id);
        if($data){
            $data->delete();
            return redirect()->back()->with('success','record deleted successfully');
        } else {
            return redirect()->back()->with('error','something went wrong');
        }
    }
}
