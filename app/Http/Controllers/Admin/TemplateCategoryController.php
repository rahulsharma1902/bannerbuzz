<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TemplateCategory;

class TemplateCategoryController extends Controller
{
    public function index(){
        $category = TemplateCategory::where('status',0)->get();
        // $category = TemplateCategory::where('status',0)->with('parent')->get()->toArray();
        // echo '<pre>';
        // print_r($category);
        // die();
        $parentCategory = TemplateCategory::where('parent_category',0)->get();
        return view('admin.templateCategory.index',compact('category','parentCategory'));
    }

    public function save(Request $request){

        if ($request->id != '') {
          $request->validate([
              'name' => 'required|unique:template_categories,name,' . $request->id,
              'slug' => 'required|unique:template_categories,slug,' . $request->id,
          ]);
        //   echo '<pre>';
        // print_r($request->all());
        // die();
          $category = TemplateCategory::find($request->id);
          $category->name = $request->name;
          $category->slug = $request->slug;
          if($request->parent_category){
            $category->parent_category = $request->parent_category;
          }else{
            $category->parent_category = 0;
          }
          $category->save();
  
          return response()->json('Successfully updated category');
      } else {
          $request->validate([
              'name' => 'required|unique:template_categories',
              'slug' => 'required|unique:template_categories',
          ]);
          
          $category = new TemplateCategory;
          $category->name = $request->name;
          $category->slug = $request->slug;
          if($request->parent_category){
            $category->parent_category = $request->parent_category;
          }
          $category->save();
  
          return response()->json('Successfully added category');
      }
      }

    //   public function remove(Request $request) {
    //     if ($request->has('id')) {
    //         $category = TemplateCategory::find($request->id);
    //         $childCategory = TemplateCategory::where('parent_category',$category->id)->get();
    //         if ($category) {
    //             $category->delete();
    //             return response()->json('Category deleted successfully');
    //             // parent_category
    //         } else {
    //             return response()->json('Category not found');
    //         }
    //     } else {
    //         return response()->json('Missing category');
    //     }
    // }
    public function remove(Request $request) {
        if ($request->has('id')) {
            $category = TemplateCategory::with('children')->find($request->id);
            
            if ($category) {
                $this->deleteCategoryAndChildren($category);
                return response()->json('Category and its children deleted successfully');
            } else {
                return response()->json('Category not found');
            }
        } else {
            return response()->json('Missing category ID');
        }
    }
    
    private function deleteCategoryAndChildren($category) {
        foreach ($category->children as $child) {
            $this->deleteCategoryAndChildren($child); // Recursive call to handle child categories
        }
        $category->delete(); // Delete this category
    }
    
}
