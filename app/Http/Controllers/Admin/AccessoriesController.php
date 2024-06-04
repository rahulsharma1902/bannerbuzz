<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccessoriesType;
use App\Models\AccessoriesVariations;
use App\Models\AccessoriesVariationsData;
use App\Models\Entities;
use App\Models\ProductAccessories;
use App\Models\AccessoriesSize;
use Illuminate\Http\Request;

class AccessoriesController extends Controller
{
    public function index()
    {
        $accessories_type = ProductAccessories::all();
        return view('admin.accessories.index', compact('accessories_type'));
    }

    public function addAccessorie($slug = null)
    {
        $entities = Entities::all();
        $product = ProductAccessories::where('slug', $slug)->first();
        $accessories_type = AccessoriesType::all();
        return view('admin.accessories.add', compact('accessories_type', 'product', 'entities'));
    }

    public function AccessoriesType()
    {
        $accessories_type = AccessoriesType::all();
        return view('admin.accessories_type.index', compact('accessories_type'));
    }

    //:::::::::::::::::: Accessories Type :::::::::::::::::://
    public function AddAccessorieType(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:accessories_types,slug',

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
        $type = new AccessoriesType();
        $type->name = $request->name;
        $type->slug = $request->slug;
        $images = [];
        if ($request->images !== null) {
            foreach ($request->images as $image) {
                if ($image->isValid()) {
                    $filename = $request->slug . time() . '.' . $image->extension();
                    $image->move(public_path() . '/accessories_Images/', $filename);
                    $images[] = $filename;
                }
            }
            $type->image = json_encode($images);
        }
        $type->description = $request->description;
        $type->save();

        return redirect()->back()->with('success', 'Accessories type added successfully');
    }

    public function removeType($id)            // removing type
    {
        $accessorie_type = AccessoriesType::find($id);
        if ($accessorie_type) {
            $products = ProductAccessories::where('accessories_type', $accessorie_type->id)->get();
            if ($products) {
                foreach ($products as $product) {
                    $product->update(['accessories_type' => null]);
                }
            }
            $accessorie_type->delete();
            return redirect()->back()->with('success', 'Accessorie Type deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Invalid Accessorie type for deletion');
        }
    }

    //:::::::::::::::: Adding Accessories :::::::::::::::::::://
    public function AccessoriesAddprocc(Request $request)
    {   
        // echo "<pre>";
        // print_r($request->all());
        // die();
        if ($request->id) {
            $request->validate([
                'name' => 'required|unique:product_accessories,name,' . $request->id,
                'slug' => 'required|unique:product_accessories,slug,' . $request->id,
                'accessorie_type' => 'required',
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
            $type = ProductAccessories::find($request->id);
            
            $type->name = $request->name;
            $type->slug = $request->slug;
            $type->accessories_type = $request->accessorie_type;
            $type->is_printed = $request->Printed;
            $type->description = $request->product_description;
            $type->additional_info = $request->product_specification;
            $type->price = $request->default_price;
            $images = [];
            if ($request->images !== null) {           // new images 
                $count = 1;
                foreach ($request->images as $image) {
                    if ($image->isValid()) {
                        $filename = $request->slug.$count . time() . '.' . $image->extension();
                        $image->move(public_path() . '/accessories_Images/', $filename);
                        $images[] = $filename;
                        $count++;
                    }
                }
            }
            if ($request->existing_images) {                   // pervious images
                $updatedImages = array_merge($request->existing_images, $images);      // mergeing the images old with new
                 $type->images = json_encode($updatedImages);
            } else {
                $type->images = json_encode($images);
            }
            if($request->keys){
                $type->key_points = json_encode($request->keys);
            }
            $type->save();
            if ($request->remove_size_id !== null) {      // remove  size 
                $size_id = explode(',', $request->remove_size_id);
                if ($size_id) {
                    foreach ($size_id as $id) {
                        $size = AccessoriesSize::find($id);
                        if ($size) {
                            $size->delete();
                        }
                    }
                }
            }
            if ($request->width !== null || $request->sizeValue !== null) {           // adding new sizes
                if ($request->size_type === 'none') {

                } else if ($request->size_type === 'wh' || $request->size_type === 'DH') {

                    for ($i = 0; $i < count($request->width); $i++) {
                        $product_size = new AccessoriesSize();
                        $product_size->accessories_id = $type->id;
                        $product_size->size_type = $request->size_type;
                        $product_size->size_value = $request->width[$i] . 'X' . $request->height[$i];
                        $product_size->size_unit = $request->size_unit;
                        $product_size->price = $request->price[$i];
                        $product_size->save();
                    }

                } else {
                    for ($i = 0; $i < count($request->sizeValue); $i++) {
                        $product_size = new AccessoriesSize();
                        $product_size->accessories_id = $type->id;
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

            if ($request->remove_variation_id !== null) {          // remove variation  
                $variations_id = explode(',', $request->remove_variation_id);
                foreach ($variations_id as $id) {
                    $data = AccessoriesVariations::find($id);
                    if ($data) {
                        $variations_data = AccessoriesVariationsData::where('accessories_variation_id', $data->id)->get();
                        if ($variations_data) {
                            foreach ($variations_data as $var_data) {
                                $var_data->delete();
                            }
                        }
                        $data->delete();
                    }
                }
            }

            if ($request->remove_variationData_id !== null) {       // remove variation data
                $variationDatas_id = explode(',', $request->remove_variationData_id);
                foreach ($variationDatas_id as $id) {
                    $data = AccessoriesVariationsData::find($id);
                    if ($data) {
                        $data->delete();
                    }
                }
            }
            if ($request->var) {         // updating variations
                foreach ($request->var as $var) {
                    $varData = AccessoriesVariations::findOrFail($var['id']);
                    $varData->name = $var['name'];
                    $varData->var_slug = $var['var_slug'];
                    $varData->entity_id = $var['entity'];
                    $varData->accessories_id = $type->id;
                    $varData->save();

                    $var_price = $var['var_slug'] . '_price';
                    $var_value = $var['var_slug'] . '_value';
                    $var_images = $var['var_slug'] . '_Images';
                    $var_description = $var['var_slug'] . '_description';

                    $variation_data = AccessoriesVariationsData::where('accessories_variation_id', $varData->id)->get();
                    for ($i = 0; $i < count($request->$var_value); $i++) {
                        if ($request->$var_value[$i] !== null) {
                            if (isset($variation_data[$i])) {
                                $variation_data[$i]->accessories_variation_id = $varData->id;
                                $variation_data[$i]->value = $request->$var_value[$i];
                                $variation_data[$i]->price = $request->$var_price[$i];
                                $variation_data[$i]->description = $request->$var_description[$i];
                                if (isset($request->$var_images[$i])) {
                                    if ($request->hasFile($var_images) && $request->file($var_images)[$i]->isValid()) {
                                        $image = $request->file($var_images)[$i];
                                        $filename = $request->$var_value[$i] . time() . '.' . $image->extension();
                                        $image->move(public_path() . '/accessories_Images/', $filename);
                                        $variation_data[$i]->image = $filename;
                                    }
                                }
                                $variation_data[$i]->save();
                            } else {
                                $var_data = new AccessoriesVariationsData();
                                $var_data->accessories_variation_id = $varData->id;
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
            if ($request->variation_name !== null) {         // adding new variations
                for ($a = 0; $a < count($request->variation_name); $a++) {
                    if ($request->variation_name[$a] !== null) {
                        $var_name = $request->var_slug[$a];
                        $entity = $request->entity_id[$a];
                        $price = $var_name . '_price';
                        $value = $var_name . '_value';
                        $var_images = $var_name . '_Images';
                        $var_description = $var_name . '_description';
                        if ($request->$value !== null) {

                            $variation = new AccessoriesVariations();
                            $variation->name = $request->variation_name[$a];
                            $variation->var_slug = $request->var_slug[$a];
                            $variation->entity_id = $entity;
                            $variation->accessories_id = $type->id;
                            $variation->save();

                            for ($i = 0; $i < count($request->$price); $i++) {
                                if ($request->$value[$i] !== null && $request->$price[$i] !== null) {
                                    $var_data = new AccessoriesVariationsData();
                                    $var_data->accessories_variation_id = $variation->id;
                                    $var_data->value = $request->$value[$i];
                                    $var_data->price = $request->$price[$i];
                                    $var_data->description = $request->$var_description[$i];
                                    if (isset($request->$var_images[$i])) {
                                        if ($request->hasFile($var_images) && $request->file($var_images)[$i]->isValid()) {
                                            $image = $request->file($var_images)[$i];
                                            $filename = $request->$value[$i] . time() . '.' . $image->extension();
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
            }
            return redirect()->back()->with('success', 'data updated successfully');
        } else {
            // $request->validate([
            //     'name' => 'required|unique:product_accessories,name',
            //     'slug' => 'required|unique:product_accessories,slug',
            //     'images' => 'required',
            //     'images.*' => 'required|image|mimes:jpeg,png,jpg,svg,webp',
            //     'accessorie_type' => 'required',
            //     'default_price' => 'required|numeric'
            // ], [
            //     'images.*.image' => 'The file must be an image.',
            //     'images.*.mimes' => 'The image must be a file of type: jpeg, png, jpg, svg,webp.',
            // ]);

            $type = new ProductAccessories();
            $type->name = $request->name;
            $type->slug = $request->slug;
            $type->accessories_type = $request->accessorie_type;
            $type->is_printed = $request->Printed;
            $type->description = $request->product_description;
            $type->additional_info = $request->product_specification;
            $type->price = $request->default_price;
            $images = [];
            if ($request->images !== null) {
                $count = 1;
                foreach ($request->images as $image) {
                    if ($image->isValid()) {
                        $filename = $request->slug.$count . time() . '.' . $image->extension();
                        $image->move(public_path() . '/accessories_Images/', $filename);
                        $images[] = $filename;
                        $count++;
                    }
                }
            }
            $type->images = json_encode($images);
            if($request->keys){
                $type->key_points = json_encode($request->keys);
            }
            $type->save();
            if ($request->width !== null || $request->sizeValue !== null) {
                if ($request->size_type === 'none') {

                } else if ($request->size_type === 'wh' || $request->size_type === 'DH') {

                    for ($i = 0; $i < count($request->width); $i++) {
                        $product_size = new AccessoriesSize();
                        $product_size->accessories_id = $type->id;
                        $product_size->size_type = $request->size_type;
                        $product_size->size_value = $request->width[$i] . 'X' . $request->height[$i];
                        $product_size->size_unit = $request->size_unit;
                        $product_size->price = $request->price[$i];
                        $product_size->save();
                    }

                } else {
                    for ($i = 0; $i < count($request->sizeValue); $i++) {
                        $product_size = new AccessoriesSize();
                        $product_size->accessories_id = $type->id;
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
                    if ($request->variation_name[$a] !== null) {
                        $var_name = $request->var_slug[$a];
                        $entity = $request->entity_id[$a];
                        $price = $var_name . '_price';
                        $value = $var_name . '_value';
                        $var_images = $var_name . '_Images';
                        $var_description = $var_name . '_description';
                        if ($request->$value !== null) {

                            $variation = new AccessoriesVariations();
                            $variation->name = $request->variation_name[$a];
                            $variation->var_slug = $request->var_slug[$a];
                            $variation->entity_id = $entity;
                            $variation->accessories_id = $type->id;
                            $variation->save();

                            for ($i = 0; $i < count($request->$price); $i++) {
                                if ($request->$value[$i] !== null && $request->$price[$i] !== null) {
                                    $var_data = new AccessoriesVariationsData();
                                    $var_data->accessories_variation_id = $variation->id;
                                    $var_data->value = $request->$value[$i];
                                    $var_data->price = $request->$price[$i];
                                    $var_data->description = $request->$var_description[$i];
                                    if (isset($request->$var_images[$i])) {
                                        if ($request->hasFile($var_images) && $request->file($var_images)[$i]->isValid()) {
                                            $image = $request->file($var_images)[$i];
                                            $filename = $request->$value[$i] . time() . '.' . $image->extension();
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
            }
        }
        return redirect()->back()->with('success', 'data added successfully');

    }

    public function removeAccessories($id)
    {
        $product = ProductAccessories::find($id);
        if ($product) {
            $product->delete();
            $productSizes = AccessoriesSize::where('accessories_id', $id)->get();
            if ($productSizes) {
                foreach ($productSizes as $size) {
                    $size->delete();
                }
            }
            $product_variation = AccessoriesVariations::where('accessories_id', $id)->get();
            if ($product_variation) {
                foreach ($product_variation as $var) {
                    $var_data = AccessoriesVariationsData::where('accessories_variation_id', $var->id)->get();
                    if ($var_data) {
                        foreach ($var_data as $data) {
                            $data->delete();
                        }
                    }
                    $var->delete();
                }
            }
            return redirect()->back()->with('success', 'Product deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Faild to deleted Product');
        }
    }
}