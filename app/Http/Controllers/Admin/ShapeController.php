<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shape;
use App\Models\ShapeCategory;
class ShapeController extends Controller
{
    public function index(Request $request){
        $shapes = Shape::with('category')->get();
        return view('admin.shape.index',compact('shapes'));
    }
    public function add(Request $request){
        $shapeCategory = ShapeCategory::where('status',0)->get();
        return view('admin.shape.add',compact('shapeCategory'));
    }

    public function addProcc(Request $request){
        $request->validate([
            'name' => 'required|unique:shapes',
            'slug' => 'required|unique:shapes',
            'category_id' => 'required',
            'image' => 'required|file|mimes:svg,image/svg+xml',
        ]);
        
        try {
            $background = new Shape;
            $background->name = $request->name;
            $background->slug = $request->slug;
            $background->category_id = $request->category_id;
            

            if ($request->hasFile('image')) {
                $featuredImage = $request->file('image');
                $extension = $featuredImage->getClientOriginalExtension();
                $featuredImageName = 'shapes_'.rand(0,1000).time().'.'.$extension;;
                $featuredImage->move(public_path().'/ShapeImage/',$featuredImageName);
                
                $background->image = $featuredImageName;    
            }else{
                return redirect()->back()->with('error','Image Not Found !');
            }

            $background->save();
            return redirect()->back()->with('success','Shapes added succefully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while adding the Shape.');
        }
    }
    public function edit(Request $request,$slug){
        if($slug){
            $shapes = Shape::where('slug',$slug)->first();
            if($shapes){
                $shapeCategory = ShapeCategory::where('status',0)->get();
                return view('admin.shape.edit',compact('shapes','shapeCategory'));
            }else{
                return abort(404);
            }
        }
    }
    public function editProcc(Request $request){
        if ($request->id) {
            $request->validate([
                'name' => 'required|unique:shapes,name,' . $request->id,
                'slug' => 'required|unique:shapes,slug,' . $request->id,
                'category_id' => 'required',
            ]);
            if ($request->hasFile('image')){
                $request->validate([
                    'image' => 'required|file|mimes:svg,image/svg+xml',
                ]);  
            }
            try {
                $shape = Shape::find($request->id);
                $shape->name = $request->name;
                $shape->slug = $request->slug;
                $shape->category_id = $request->category_id;
                
                if ($request->hasFile('image')) {
                    $featuredImage = $request->file('image');
                    $extension = $featuredImage->getClientOriginalExtension();
                    $featuredImageName = 'Shape_' . rand(0, 1000) . time() . '.' . $extension;
                    $featuredImage->move(public_path('ShapeImage'), $featuredImageName);
                    $shape->image = $featuredImageName;
                }


                $shape->save();
                return redirect('admin-dashboard/shape-edit/' . $request->slug)->with('success', 'Shape updated successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'An error occurred while updating the product.');
            }
        } else {
            return redirect()->back()->with('error', 'Failed to update Shape.');
        }
    }

    public function remove(Request $request,$slug) {
        if ($slug) {
            $shape = Shape::where('slug',$slug)->first();
            if ($shape) {
                $shape->delete();
                return response()->json('shape deleted successfully');
            } else {
                return response()->json('shape not found');
            }
        } else {
            return response()->json('Missing shape');
        }
    }
}
