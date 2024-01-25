<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Background;
use App\Models\BackgroundCategory;

class BackgroundController extends Controller
{
    //
    public function index(Request $request){
        $backgrounds = Background::with('category')->get();

        // echo '<pre>';
        // print_r($backgrounds);
        // die();
        return view('admin.backgroud.index',compact('backgrounds'));
    }
    public function add(Request $request){
        $backgroundCategory = BackgroundCategory::where('status',0)->get();
        return view('admin.backgroud.add',compact('backgroundCategory'));
    }
    public function addProcc(Request $request){
        $request->validate([
            'name' => 'required|unique:backgrounds',
            'slug' => 'required|unique:backgrounds',
            'category_id' => 'required',
            'image' => 'required',

        ]);
        try {
            $background = new Background;
            $background->name = $request->name;
            $background->slug = $request->slug;
            $background->category_id = $request->category_id;
            

            if ($request->hasFile('image')) {
                $featuredImage = $request->file('image');
                $extension = $featuredImage->getClientOriginalExtension();
                $featuredImageName = 'banner_'.rand(0,1000).time().'.'.$extension;;
                $featuredImage->move(public_path().'/BannerImage/',$featuredImageName);
                
                $background->image = $featuredImageName;    
            }else{
                return redirect()->back()->with('error','Image Not Found !');
            }

            $background->save();
            return redirect()->back()->with('success','Product added succefully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while adding the product.');
        }
    }

    public function edit(Request $request,$slug){
        if($slug){
            $backgrounds = Background::where('slug',$slug)->first();
            if($backgrounds){
                $backgroundCategory = BackgroundCategory::where('status',0)->get();
                return view('admin.backgroud.edit',compact('backgrounds','backgroundCategory'));
            }else{
                return abort(404);
            }
        }
    }
    public function editProcc(Request $request){
        if ($request->id) {
            $request->validate([
                'name' => 'required|unique:backgrounds,name,' . $request->id,
                'slug' => 'required|unique:backgrounds,slug,' . $request->id,
                'category_id' => 'required',
            ]);
        
            try {
                $background = Background::find($request->id);
                $background->name = $request->name;
                $background->slug = $request->slug;
                $background->category_id = $request->category_id;
                
                if ($request->hasFile('image')) {
                    $featuredImage = $request->file('image');
                    $extension = $featuredImage->getClientOriginalExtension();
                    $featuredImageName = 'Banner_' . rand(0, 1000) . time() . '.' . $extension;
                    $featuredImage->move(public_path('BannerImage'), $featuredImageName);
                    $background->image = $featuredImageName;
                }


                $background->save();
                return redirect('admin-dashboard/background-edit/' . $request->slug)->with('success', 'Background updated successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'An error occurred while updating the product.');
            }
        } else {
            return redirect()->back()->with('error', 'Failed to update Background.');
        }
    }
}
