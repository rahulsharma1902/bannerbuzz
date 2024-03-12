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
use App\Models\ProductVariationsData;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function addProduct($slug = null)
    {
        $product = Product::where('slug', $slug)->first();
        $categories = ProductCategories::all();
        $product_types = ProductType::all();
        $accessories_type = AccessoriesType::all();
        $entities = Entities::all();
        return view('admin.products.add', compact('product', 'categories', 'product_types', 'accessories_type', 'entities'));
    }

    //::::::::::::: Add or Update Product Function ::::::::::::::::::::::::::::::::::://
    public function addProcc(Request $request)
    {
        if ($request->id) {
            $request->validate([
                'name' => 'required|unique:products,name,' . $request->id,
                'slug' => 'required|unique:products,slug,' . $request->id,
                'category_id' => 'required',
                'default_price' => 'required|numeric'
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
            $product = Product::find($request->id);
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->category_id = $request->category_id;
            $product->product_type_id = $request->product_type_id;
            $product->accessories_type_id = $request->accessorie_type;
            $product->is_printed = $request->Printed;
            $product->description = $request->product_description;
            $product->addtional_info = $request->product_specification;
            $product->price = $request->default_price;
            $images = [];
            if ($request->images !== null) {     // adding new images 
                $count = 1; 
                foreach ($request->images as $image) {
                    if ($image->isValid()) {
                        $filename = $request->slug.$count . time() . '.' . $image->extension();
                        $image->move(public_path() . '/product_Images/', $filename);
                        $images[] = $filename;
                        $count++;
                    }
                }
            }
            if ($request->existing_images) {           // merging with pervious images
                $updatedImages = array_merge($request->existing_images, $images);
                $product->images = json_encode($updatedImages);
            } else {
                $product->images = json_encode($images);
            }
            $product->save();


            //:::::::::: removing sizes ::::::::::::::::::://
            if ($request->remove_size_id !== null) {     
                $size_id = explode(',', $request->remove_size_id);
                if ($size_id) {
                    foreach ($size_id as $id) {
                        $size = ProductSize::find($id);
                        if ($size) {
                            $size->delete();
                        }
                    }
                }
            }
            //::::::::::::::: adding new sizes ::::::::::::::::::://
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
                        if ($request->size_type == 'Custom') {

                        } else {
                            $product_size->size_unit = $request->size_unit;
                        }
                        $product_size->price = $request->price[$i];
                        $product_size->save();
                    }
                }
            }
            //:::::::::::::::: removing variation and its data   :::::::::::::::::::://
            if ($request->remove_variation_id !== null) {     
                $variations_id = explode(',', $request->remove_variation_id);
                foreach ($variations_id as $id) {
                    $data = ProductVariations::find($id);
                    if ($data) {
                        $variations_data = ProductVariationsData::where('product_variation_id', $data->id)->get();
                        if ($variations_data) {
                            foreach ($variations_data as $var_data) {
                                $var_data->delete();
                            }
                        }
                        $data->delete();
                    }
                }
            }
            if ($request->remove_variationData_id !== null) {       
                $variationDatas_id = explode(',', $request->remove_variationData_id);
                foreach ($variationDatas_id as $id) {
                    $data = ProductVariationsData::find($id);
                    if ($data) {
                        $data->delete();
                    }
                }
            }
            //::::::::::::: updating variations :::::::::::::::::://
            if ($request->var) {         
                foreach ($request->var as $var) {
                    $varData = ProductVariations::findOrFail($var['id']);
                    $varData->name = $var['name'];
                    $varData->var_slug = $var['var_slug'];
                    $varData->entity_id = $var['entity'];
                    $varData->product_id = $product->id;
                    $varData->save();

                    $var_price = $var['var_slug'] . '_price';
                    $var_value = $var['var_slug'] . '_value';
                    $var_images = $var['var_slug'] . '_Images';
                    $var_description = $var['var_slug'] . '_description';

                    $variation_data = ProductVariationsData::where('product_variation_id', $varData->id)->get();
                    for ($i = 0; $i < count($request->$var_value); $i++) {
                        if ($request->$var_value[$i] !== null) {
                            if (isset($variation_data[$i])) {
                                $variation_data[$i]->product_variation_id = $varData->id;
                                $variation_data[$i]->value = $request->$var_value[$i];
                                $variation_data[$i]->price = $request->$var_price[$i];
                                $variation_data[$i]->description = $request->$var_description[$i];
                                if ($request->hasFile($var_images) && $request->file($var_images)[$i]->isValid()) {
                                    $image = $request->file($var_images)[$i];
                                    $filename = $request->$var_value[$i] . time() . '.' . $image->extension();
                                    $image->move(public_path() . '/accessories_Images/', $filename);
                                    $variation_data[$i]->image = $filename;
                                }
                                $variation_data[$i]->save();
                            } else {
                                $var_data = new ProductVariationsData();
                                $var_data->product_variation_id = $varData->id;
                                $var_data->value = $request->$var_value[$i];
                                $var_data->price = $request->$var_price[$i];
                                $var_data->description = $request->$var_description[$i];
                                if (isset($request->$var_images[$i])) {
                                    if ($request->hasFile($var_images) && $request->file($var_images)[$i]->isValid()) {
                                        $image = $request->file($var_images)[$i];
                                        $filename = $request->$var_value[$i] . time() . '.' . $image->extension();
                                        $image->move(public_path() . '/accessories_Images/', $filename);
                                        $var_data->image = $filename;
                                    }
                                }
                                $var_data->save();
                            }
                        }
                    }
                }
            }
            //:::::::::::::::::: adding new variations :::::::::::::::::://
            if ($request->variation_name !== null) {
                for ($a = 0; $a < count($request->variation_name); $a++) {
                    if ($request->variation_name[$a] !== null) {
                        $var_name = $request->var_slug[$a];
                        $entity = $request->entity_id[$a];
                        $price = $var_name . '_price';
                        $value = $var_name . '_value';
                        $var_images = $var_name . '_Images';
                        $var_description = $var_name . '_description';
                        if ($request->$value !== null) {
                            $variation = new ProductVariations();
                            $variation->name = $request->variation_name[$a];
                            $variation->var_slug = $request->var_slug[$a];
                            $variation->entity_id = $entity;
                            $variation->product_id = $product->id;
                            $variation->save();

                            for ($i = 0; $i < count($request->$price); $i++) {
                                if ($request->$value[$i] !== null || $request->$price[$i] !== null) {
                                    $var_data = new ProductVariationsData();
                                    $var_data->product_variation_id = $variation->id;
                                    $var_data->value = $request->$value[$i];
                                    $var_data->price = $request->$price[$i];
                                    $var_data->description = $request->$var_description[$i];
                                    if (isset($request->$var_images[$i])) {
                                        if ($request->file($var_images)[$i]->isValid()) {
                                            $image = $request->file($var_images)[$i];
                                            $filename = $request->$var_value[$i] . time() . '.' . $image->extension();
                                            $image->move(public_path() . '/product_Images/', $filename);
                                            $var_data->image = $filename;
                                        }
                                    }
                                    $var_data->save();
                                }
                            }
                        }
                    }
                }
            }
            return redirect()->back()->with('success', 'data updated successfully');

        } else {
            $request->validate(
                [
                    'name' => 'required|unique:products,name',
                    'slug' => 'required|unique:products,slug',
                    'images' => 'required',
                    'images.*' => 'required|image|mimes:jpeg,png,jpg,svg,webp',
                    'category_id' => 'required',
                    'default_price' => 'required|numeric'
                ],
                [
                    'images.*.image' => 'The file must be an image.',
                    'images.*.mimes' => 'The image must be a file of type: jpeg, png, jpg, svg,webp.',
                ]
            );

            $product = new Product();
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->category_id = $request->category_id;
            $product->product_type_id = $request->product_type_id;
            $product->accessories_type_id = $request->accessorie_type;
            $product->is_printed = $request->Printed;
            $product->price = $request->default_price;
            $product->description = $request->product_description;
            $product->addtional_info = $request->product_specification;
            $product->price = $request->default_price;
            $images = [];
            if ($request->images !== null) {
                $count = 1;
                foreach ($request->images as $image) {
                    if ($image->isValid()) {
                        $filename = $request->slug.$count . time() . '.' . $image->extension();
                        $image->move(public_path() . '/product_Images/', $filename);
                        $images[] = $filename;
                        $count++;
                    }
                }
            }
            $product->images = json_encode($images);
            $product->save();

            //:::::::::::::::: adding sizes :::::::::::::::://
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
                        if ($request->size_type == 'Custom') {

                        } else {
                            $product_size->size_unit = $request->size_unit;
                        }
                        $product_size->price = $request->price[$i];
                        $product_size->save();
                    }
                }
            }

            //::::::::::::: Adding variations ::::::::::::::::::::://
            if ($request->variation_name !== null) {
                for ($a = 0; $a < count($request->variation_name); $a++) {
                    if ($request->variation_name[$a] !== null) {
                        $var_name = $request->var_slug[$a];
                        $entity = $request->entity_id[$a];
                        $price = $var_name . '_price';
                        $value = $var_name . '_value';
                        $var_images = $var_name . '_Images';
                        $var_description = $var_name . '_description';
                        if ($request->$value !== null) {
                            $variation = new ProductVariations();
                            $variation->name = $request->variation_name[$a];
                            $variation->var_slug = $request->var_slug[$a];
                            $variation->entity_id = $entity;
                            $variation->product_id = $product->id;
                            $variation->save();

                            for ($i = 0; $i < count($request->$price); $i++) {
                                if ($request->$value[$i] !== null || $request->$price[$i] !== null) {
                                    $var_data = new ProductVariationsData();
                                    $var_data->product_variation_id = $variation->id;
                                    $var_data->value = $request->$value[$i];
                                    $var_data->price = $request->$price[$i];
                                    $var_data->description = $request->$var_description[$i];
                                    if (isset($request->$var_images[$i])) {
                                        if ($request->file($var_images)[$i]->isValid()) {
                                            $image = $request->file($var_images)[$i];
                                            $filename = $request->$value[$i] . time() . '.' . $image->extension();
                                            $image->move(public_path() . '/product_Images/', $filename);
                                            $var_data->image = $filename;
                                        }
                                    }
                                    $var_data->save();
                                }
                            }
                        }
                    }
                }
            }
        }
        return redirect()->back()->with('success', 'data added successfully');

    }

    //::::::::::::::::: Remove product function :::::::::::::::::::://
    public function removeProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product_sizes = ProductSize::where('product_id', $id)->get();
            if ($product_sizes) {
                foreach ($product_sizes as $size) {
                    $size->delete();
                }
            }
            $product_variation = ProductVariations::where('product_id', $id)->get();
            if ($product_variation) {
                foreach ($product_variation as $var) {
                    $var_data = ProductVariationsData::where('product_variation_id', $var->id)->get();
                    if ($var_data) {
                        foreach ($var_data as $data) {
                            $data->delete();
                        }
                    }
                    $var->delete();
                }
            }
            $product->delete();
            return redirect()->back()->with('success', 'Product  deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Invalid product type for deletion');
        }
    }
}
