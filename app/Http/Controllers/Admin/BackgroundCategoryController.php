<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackgroundCategory;

class BackgroundCategoryController extends Controller
{
    //
    public function index(){
        $category = BackgroundCategory::where('status',0)->get();
        return view('admin.backgroundCategory.index',compact('category'));
    }

    public function save(Request $request){
      if ($request->id != '') {
        $request->validate([
            'name' => 'required|unique:background_categories,name,' . $request->id,
            'slug' => 'required|unique:background_categories,slug,' . $request->id,
        ]);
        
        $category = BackgroundCategory::find($request->id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return response()->json('Successfully updated category');
    } else {
        $request->validate([
            'name' => 'required|unique:background_categories',
            'slug' => 'required|unique:background_categories',
        ]);

        $category = new BackgroundCategory;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return response()->json('Successfully added category');
    }
    }

    public function remove(Request $request) {
      if ($request->has('id')) {
          $category = BackgroundCategory::find($request->id);
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