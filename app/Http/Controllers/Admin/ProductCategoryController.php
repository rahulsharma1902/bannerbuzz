<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategories;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index($slug = null)
    {
        if ($slug) {
            $categories = ProductCategories::where('slug', '!=', $slug)->get();
        } else {
            $categories = ProductCategories::all();
        }
        $category = ProductCategories::where('slug', $slug)->first();
        return view('admin.productCategory.index', compact('categories', 'category'));
    }

    public function AddCategory(Request $request)
    {
        // dd($request->all());
        if ($request->id) {
            $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:product_categories,id,' . $request->id,
            ]);

            $category = ProductCategories::find($request->id);
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->parent_category = $request->parent_category;
            $category->description = $request->description;
            $images = [];
            if ($request->images !== null) {
                foreach ($request->images as $image) {
                    if ($image->isValid()) {
                        $filename = $request->title . rand(0, 100) . '.' . $image->extension();
                        $image->move(public_path() . '/category_Images/', $filename);
                        $images[] = $filename;
                    }
                }
            }
            if ($request->existing_images) {
                $updatedImages = array_merge($request->existing_images, $images);
                $category->images = json_encode($updatedImages);
            } else {
                $category->images = json_encode($images);
            }
            $category->save();

            return redirect()->back()->with('success', 'Successfully Updated category');
        } else {
            $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:product_categories',
            ]);

            $category = new ProductCategories();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->parent_category = $request->parent_category;
            $category->description = $request->description;
            $images = [];
            if ($request->images !== null) {
                foreach ($request->images as $image) {
                    if ($image->isValid()) {
                        $filename = $request->title . rand(0, 100) . '.' . $image->extension();
                        $image->move(public_path() . '/category_Images/', $filename);
                        $images[] = $filename;
                    }
                }
            }
            $category->images = json_encode($images);
            $category->save();

            return redirect()->back()->with('success', 'Successfully Added category');
        }
    }

    public function DeleteCategory(Request $request, $slug)
    {
        if ($slug) {
            $category = ProductCategories::where('slug', $slug)->first();

            if ($category) {
                $childCategories = ProductCategories::where('parent_category', $category->id)->get();
                foreach ($childCategories as $childCategory) {
                    $childCategory->delete();
                }
                $category->delete();
                return redirect()->back()->with('success', 'Category has been removed');
            } else {
                return redirect()->back()->with('error', 'Invalid category for deletion');
            }
        }
        return redirect()->back()->with('error', 'Invalid category for deletion');
    }

    public function CategoryList()
    {
        $categories = ProductCategories::with('parent')->get();

        return view('admin.productCategory.List', compact('categories'));
    }

}
