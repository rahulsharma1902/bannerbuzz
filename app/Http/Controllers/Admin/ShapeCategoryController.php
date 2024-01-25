<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShapeCategory;

class ShapeCategoryController extends Controller
{
    public function index(){
        $category = ShapeCategory::where('status',0)->get();
        return view('admin.shapeCategory.index',compact('category'));
    }

    public function save(Request $request){
        if ($request->id != '') {
          $request->validate([
              'name' => 'required|unique:shape_categories,name,' . $request->id,
              'slug' => 'required|unique:shape_categories,slug,' . $request->id,
          ]);
          
          $category = ShapeCategory::find($request->id);
          $category->name = $request->name;
          $category->slug = $request->slug;
          $category->save();
  
          return response()->json('Successfully updated category');
      } else {
          $request->validate([
              'name' => 'required|unique:shape_categories',
              'slug' => 'required|unique:shape_categories',
          ]);
  
          $category = new ShapeCategory;
          $category->name = $request->name;
          $category->slug = $request->slug;
          $category->save();
  
          return response()->json('Successfully added category');
      }
      }
  
      public function remove(Request $request) {
        if ($request->has('id')) {
            $category = ShapeCategory::find($request->id);
            if ($category) {
                $category->delete();
                return response()->json('Category deleted successfully');
            } else {
                return response()->json('Category not found');
            }
        } else {
            return response()->json('Missing category');
        }
    }

}
