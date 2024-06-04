<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clipart;
use App\Models\ClipArtCategory;
class ClipArtController extends Controller
{
    public function index(Request $request){
        $cliparts = Clipart::with('category')->get();
        return view('admin.clipart.index',compact('cliparts'));
    }

    public function add(Request $request){
        $clipartCategory = ClipArtCategory::where('status',0)->get();
        return view('admin.clipart.add',compact('clipartCategory'));
    }

    public function addProcc(Request $request){
        $request->validate([
            'name' => 'required|unique:cliparts',
            'slug' => 'required|unique:cliparts',
            'category_id' => 'required',
            'image' => 'required|file|mimes:svg,image/svg+xml',
        ]);
        
        try {
            $clipart = new Clipart;
            $clipart->name = $request->name;
            $clipart->slug = $request->slug;
            $clipart->category_id = $request->category_id;
            

            if ($request->hasFile('image')) {
                $featuredImage = $request->file('image');
                $extension = $featuredImage->getClientOriginalExtension();
                $featuredImageName = 'clipart_'.rand(0,1000).time().'.'.$extension;;
                $featuredImage->move(public_path().'/ClipArtImage/',$featuredImageName);
                
                $clipart->image = $featuredImageName;    
            }else{
                return redirect()->back()->with('error','Image Not Found !');
            }

            $clipart->save();
            return redirect()->back()->with('success','Clipart added succefully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while adding the Clipart.');
        }
    }
    public function edit(Request $request,$slug){
        if($slug){
            $cliparts = Clipart::where('slug',$slug)->first();
            if($cliparts){
                $clipartCategory = ClipArtCategory::where('status',0)->get();
                return view('admin.clipart.edit',compact('cliparts','clipartCategory'));
            }else{
                return abort(404);
            }
        }
    }
    public function editProcc(Request $request){
        if ($request->id) {
            $request->validate([
                'name' => 'required|unique:cliparts,name,' . $request->id,
                'slug' => 'required|unique:cliparts,slug,' . $request->id,
                'category_id' => 'required',
            ]);
            if ($request->hasFile('image')){
                $request->validate([
                    'image' => 'required|file|mimes:svg,image/svg+xml',
                ]);  
            }
            try {
                $clipart = Clipart::find($request->id);
                $clipart->name = $request->name;
                $clipart->slug = $request->slug;
                $clipart->category_id = $request->category_id;
                
                if ($request->hasFile('image')) {
                    $featuredImage = $request->file('image');
                    $extension = $featuredImage->getClientOriginalExtension();
                    $featuredImageName = 'Clipart_' . rand(0, 1000) . time() . '.' . $extension;
                    $featuredImage->move(public_path('ClipArtImage'), $featuredImageName);
                    $clipart->image = $featuredImageName;
                }


                $clipart->save();
                return redirect('admin-dashboard/clipart-edit/' . $request->slug)->with('success', 'Clipart updated successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'An error occurred while updating the product.');
            }
        } else {
            return redirect()->back()->with('error', 'Failed to update Clipart.');
        }
    }
    public function remove(Request $request,$slug) {
        if ($slug) {
            $clipart = Clipart::where('slug',$slug)->first();
            if ($clipart) {
                $clipart->delete();
                // return response()->json('Clipart deleted successfully');
                return redirect()->back()->with('success', 'Clipart deleted successfully');

            } else {
                return redirect()->back()->with('error', 'Clipart not found');

                // return response()->json('Clipart not found');
            }
        } else {
            // return response()->json('Missing Clipart');
            return redirect()->back()->with('error', 'Clipart not found');

        }
    }
}
