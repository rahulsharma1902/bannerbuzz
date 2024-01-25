<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClipArtCategory;
class ClipArtCategoryController extends Controller
{
    public function index(){
        $category = ClipArtCategory::where('status',0)->get();
        return view('admin.clipartCategory.index',compact('category'));
    }
    public function save(Request $request){
        if ($request->id != '') {
          $request->validate([
              'name' => 'required|unique:clip_art_categories,name,' . $request->id,
              'slug' => 'required|unique:clip_art_categories,slug,' . $request->id,
          ]);
          
          $category = ClipArtCategory::find($request->id);
          $category->name = $request->name;
          $category->slug = $request->slug;
          $category->save();
  
          return response()->json('Successfully updated category');
      } else {
          $request->validate([
              'name' => 'required|unique:clip_art_categories',
              'slug' => 'required|unique:clip_art_categories',
          ]);
  
          $category = new ClipArtCategory;
          $category->name = $request->name;
          $category->slug = $request->slug;
          $category->save();
  
          return response()->json('Successfully added category');
      }
      }
  
      public function remove(Request $request) {
        if ($request->has('id')) {
            $category = ClipArtCategory::find($request->id);
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
