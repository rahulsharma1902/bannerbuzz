<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccessoriesType;
use App\Models\Entities;
use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\ProductSize;
use App\Models\ProductType;
use App\Models\ProductVariations;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    public function addProduct($slug = null)
    {
        $product = Product::where('slug',$slug)->first();
        $categories = ProductCategories::all();
        $product_types = ProductType::all();
        $accessories_type = AccessoriesType::all();
        $entities = Entities::all();
        return view('admin.products.add',compact('product','categories','product_types','accessories_type','entities'));
    }

    public function addProcc(Request $request)
    {
        if ($request->id) {
            $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:product_accessories,id,' . $request->id,
                'accessorie_type' => 'required',
            ]);
            $product = Product::find($request->id);
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->category_id = $request->category_id;
            $product->product_type_id = $request->product_type_id;
            $product->accessories_type = $request->accessorie_type;
            // $product->is_printed = $request->Printed;
            $product->description = $request->description;
            $product->price = $request->default_price;
            $images = [];
            if ($request->images !== null) {
                foreach ($request->images as $image) {
                    if ($image->isValid()) {
                        $filename = $request->title . rand(0, 100) . '.' . $image->extension();
                        $image->move(public_path() . '/accessories_Images/', $filename);
                        $images[] = $filename;
                    }
                }
            }
            if ($request->existing_images) {
                $updatedImages = array_merge($request->existing_images, $images);
                $product->images = json_encode($updatedImages);
            } else {
                $product->images = json_encode($images);
            }
            $product->save();

            if ($request->width !== null || $request->sizeValue !== null) {
                if ($request->size_type === 'none') {

                } else if ($request->size_type === 'wh' || $request->size_type === 'DH') {

                    for ($i = 0; $i < count($request->width); $i++) {
                        $product_size = new ProductSize();
                        $product_size->product_id = $product->id;
                        $product_size->size_type = $request->size_type;
                        $product_size->size_value = $request->width[$i] . 'X' . $request->height[$i];
                        $product_size->size_unit = $request->size_unit;
                        $product_size->price = $request->price[$i];
                        $product_size->save();
                    }

                } else {
                    for ($i = 0; $i < count($request->sizeValue); $i++) {
                        $product_size = new ProductSize();
                        $product_size->product_id = $product->id;
                        $product_size->size_type = $request->size_type;
                        $product_size->size_value = $request->sizeValue[$i];
                        $product_size->size_unit = $request->size_unit;
                        $product_size->price = $request->price[$i];
                        $product_size->save();
                    }
                }
            }

            if ($request->variation_name !== null) {
                for ($a = 0; $a < count($request->variation_name); $a++) {
                    $var_name = $request->variation_name[$a];
                    $entity = $request->entity_id[$a];
                    $price = $var_name . '_price';
                    $value = $var_name . '_value';

                    for ($i = 0; $i < count($request->$price); $i++) {
                        $variation = new ProductVariations();
                        $variation->name = $var_name;
                        $variation->entity_id = $entity;
                        $variation->product_id = $product->id;
                        $variation->value = $request->$value[$i];
                        $variation->price = $request->$price[$i];
                        $variation->save();
                    }
                }
            }

            return redirect()->back()->with('success', 'data updated successfully');
        } else {
            $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:product_accessories,slug',
                'images' => 'required',
                'accessorie_type' => 'required',
            ]);

            $product = new Product();
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->category_id = $request->category_id;
            $product->product_type_id = $request->product_type_id;
            $product->accessories_type_id = $request->accessorie_type;
            // $product->is_printed = $request->Printed;
            $product->description = $request->description;
            $product->price = $request->default_price;
            $images = [];
            if ($request->images !== null) {
                foreach ($request->images as $image) {
                    if ($image->isValid()) {
                        $filename = $request->title . rand(0, 100) . '.' . $image->extension();
                        $image->move(public_path() . '/accessories_Images/', $filename);
                        $images[] = $filename;
                    }
                }
            }
            $product->images = json_encode($images);
            $product->save();

            if ($request->width !== null || $request->sizeValue !== null) {
                if ($request->size_type === 'none') {

                } else if ($request->size_type === 'wh' || $request->size_type === 'DH') {

                    for ($i = 0; $i < count($request->width); $i++) {
                        $product_size = new ProductSize();
                        $product_size->product_id = $product->id;
                        $product_size->size_type = $request->size_type;
                        $product_size->size_value = $request->width[$i] . 'X' . $request->height[$i];
                        $product_size->size_unit = $request->size_unit;
                        $product_size->price = $request->price[$i];
                        $product_size->save();
                    }

                } else {
                    for ($i = 0; $i < count($request->sizeValue); $i++) {
                        $product_size = new ProductSize();
                        $product_size->product_id = $product->id;
                        $product_size->size_type = $request->size_type;
                        $product_size->size_value = $request->sizeValue[$i];
                        $product_size->size_unit = $request->size_unit;
                        $product_size->price = $request->price[$i];
                        $product_size->save();
                    }
                }
            }
            if ($request->variation_name !== null) {
                for ($a = 0; $a < count($request->variation_name); $a++) {
                    $var_name = $request->variation_name[$a];
                    $entity = $request->entity_id[$a];
                    $price = $var_name . '_price';
                    $value = $var_name . '_value';

                    for ($i = 0; $i < count($request->$price); $i++) {
                        $variation = new ProductVariations();
                        $variation->name = $var_name;
                        $variation->entity_id = $entity;
                        $variation->product_id = $product->id;
                        $variation->value = $request->$value[$i];
                        $variation->price = $request->$price[$i];
                        $variation->save();
                    }
                }
            }
            return redirect()->back()->with('success', 'data added successfully');
        }
    }
}
