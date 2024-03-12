<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryFAQ;
use App\Models\ProductCategories;
use App\Models\ProductType;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index($slug = null)
    {
        $category = ProductCategories::where('slug', $slug)->first();
        if ($category) {
            if ($category->parent_category === null) {
                $categories = ProductCategories::where('slug', '!=', $slug)->whereNull('parent_category')->get();
            } else {
                $categories = ProductCategories::where('slug', '!=', $slug)->get();
            }
        } else {
            $categories = ProductCategories::all();
        }

        return view('admin.productCategory.index', compact('categories', 'category'));
    }

    public function AddCategory(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // die();
        if ($request->id) {
            $request->validate([
                'name' => 'required|unique:product_categories,name,' . $request->id,
                'slug' => 'required|unique:product_categories,slug,' . $request->id,
            ]);
            if ($request->images !== null) {
                $request->validate(
                    [
                        'images' => 'required',
                        'images.*' => 'required|image|mimes:jpeg,png,jpg,svg,webp',
                    ],
                    [
                        'images.*.image' => 'The file must be an image.',
                        'images.*.mimes' => 'The image must be a file of type: jpeg, png, jpg, svg,webp.',
                    ]
                );
            }
            if ($request->cat_image !== null) {
                $request->validate(
                    [
                        'cat_image' => 'required',
                        'cat_image.*' => 'required|image|mimes:jpeg,png,jpg,svg',
                    ],
                    [
                        'cat_image.*.image' => 'The file must be an image.',
                        'cat_image.*.mimes' => 'The image must be a file of type: jpeg, png, jpg, svg.',
                    ]
                );
            }
            $category = ProductCategories::find($request->id);
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->parent_category = $request->parent_category;
            $category->description = $request->description;
            if ($request->hasFile('cat_image')) {
                $img = $request->cat_image;
                $filename = 'cat_image' . time() . '.' . $img->extension();
                $img->move(public_path() . '/category_Images/', $filename);
                $category->cat_image = $filename;
            }
            $images = [];
            if ($request->images !== null) {
                $count = 1;
                foreach ($request->images as $image) {
                    if ($image->isValid()) {
                        $filename = $request->slug . $count . time() . '.' . $image->extension();
                        $image->move(public_path() . '/category_Images/', $filename);
                        $images[] = $filename;
                        $count++;
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

            if ($category && $request->remove_FAQ_id !== null) {
                $Data_id = explode(',', $request->remove_FAQ_id);
                foreach ($Data_id as $id) {
                    $data = CategoryFAQ::find($id);
                    if ($data) {
                        $data->delete();
                    }
                }
            }
            if ($request->faqs) {
                foreach ($request->faqs as $faqData) {
                    $faq = CategoryFAQ::findOrFail($faqData['id']);
                    $faq->title = $faqData['title'];
                    $faq->description = $faqData['description'];
                    $faq->save();
                }
            }
            // Add new FAQs
            if ($request->new_title) {
                for ($i = 0; $i < count($request->new_title); $i++) {
                    if ($request->new_title[$i] != null && $request->new_description[$i] != null) {
                        $cat_faq = new CategoryFAQ();
                        $cat_faq->category_id = $category->id;
                        $cat_faq->title = $request->new_title[$i];
                        $cat_faq->description = $request->new_description[$i];
                        $cat_faq->save();
                    }
                }
            }


            return redirect()->back()->with('success', 'Successfully Updated category');
        } else {
            $request->validate([
                'name' => 'required|unique:product_categories,name',
                'slug' => 'required|unique:product_categories,slug',
                'cat_image' => 'required',
                'cat_image.*' => 'required|image|mimes:jpeg,png,jpg,svg,webp',
            ]);
            if ($request->images !== null) {
                $request->validate(
                    [
                        'images' => 'required',
                        'images.*' => 'required|image|mimes:jpeg,png,jpg,svg,webp',
                    ],
                    [
                        'images.*.image' => 'The file must be an image.',
                        'images.*.mimes' => 'The image must be a file of type: jpeg, png, jpg, svg,webp.',
                    ]
                );
            }
            $category = new ProductCategories();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->parent_category = $request->parent_category;
            $category->description = $request->description;
            if ($request->hasFile('cat_image')) {
                $img = $request->cat_image;
                $filename = 'cat_image' . time() . '.' . $img->extension();
                $img->move(public_path() . '/category_Images/', $filename);
                $category->cat_image = $filename;
            }
            $images = [];
            if ($request->images !== null) {
                $count = 1;
                foreach ($request->images as $image) {
                    if ($image->isValid()) {
                        $filename = $request->slug . $count . time() . '.' . $image->extension();
                        $image->move(public_path() . '/category_Images/', $filename);
                        $images[] = $filename;
                        $count++;
                    }
                }
            }
            $category->images = json_encode($images);
            $category->save();
            for ($i = 0; $i < count($request->new_title); $i++) {
                if ($request->new_title[$i] != null && $request->new_description[$i] != null) {
                    $cat_faq = new CategoryFAQ();
                    $cat_faq->category_id = $category->id;
                    $cat_faq->title = $request->new_title[$i];
                    $cat_faq->description = $request->new_description[$i];
                    $cat_faq->save();
                }
            }

            return redirect()->back()->with('success', 'Successfully Added category');
        }
    }

    public function DeleteCategory(Request $request, $slug)
    {
        if ($slug) {
            $category = ProductCategories::where('slug', $slug)->first();

            if ($category) {
                $products = Product::where('category_id', $category->id)->get();
                if ($products) {
                    return redirect()->back()->with('error', 'You cannot remove category having products');
                } else {
                    $childCategories = ProductCategories::where('parent_category', $category->id)->get();
                    if ($childCategories) {
                        foreach ($childCategories as $childCategory) {
                            $childCategory->update(['parent_category' => null]);
                        }
                    }

                    $productType = ProductType::where('category_id', $category->id)->get();
                    if ($productType) {
                        foreach ($productType as $type) {
                            $type->delete();
                        }
                    }
                    $FAQs = CategoryFAQ::where('category_id', $category->id)->get();
                    if ($FAQs) {
                        foreach ($FAQs as $f) {
                            $f->delete();
                        }
                    }
                    $category->delete();
                    return redirect()->back()->with('success', 'Category has been removed');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid category for deletion');
            }
        }
        return redirect()->back()->with('error', 'Invalid category for deletion');
    }

    public function CategoryList()
    {
        $parent_categories = ProductCategories::whereNull('parent_category')->get();
        $categories = ProductCategories::whereNotNull('parent_category')->get();

        return view('admin.productCategory.List', compact('categories', 'parent_categories'));
    }


    // product type
    public function ProductType()
    {
        $categories = ProductCategories::all();
        $product_type = ProductType::all();
        return view('admin.product_type.index', compact('categories', 'product_type'));
    }

    public function AddProductType(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:product_types',

        ]);
        $product_type = new ProductType();
        $product_type->name = $request->name;
        $product_type->slug = $request->slug;
        $product_type->category_id = $request->category;
        $product_type->save();

        return redirect()->back()->with('success', 'product Type added successfully');
    }

    public function removeProductType($id)
    {
        $product_type = ProductType::find($id);
        if ($product_type) {
            $products = Product::where('product_type_id', $id)->get();
            if ($products) {
                foreach ($products as $product) {
                    $product->update(['product_type_id' => null]);
                }
            }
            $product_type->delete();
            return redirect()->back()->with('success', 'product Type deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Invalid product type for deletion');
        }
    }

    public function changeStatus(Request $request)
    {
        $id = $request->input('id');
        if ($id !== null) {
            $category = ProductCategories::find($id);
            if ($category) {
                if ($category->display_on === 1) {
                    $category->update(['display_on' => false]);
                } else {
                    $category->update(['display_on' => true]);
                }
                return response()->json('success');
            } else {
                return response()->json('fail');
            }
        } else {
            return response()->json('fail');
        }
    }
}
