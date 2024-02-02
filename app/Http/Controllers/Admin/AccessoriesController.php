<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccessoriesType;
use App\Models\AccessoriesVariations;
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

    public function AddAccessorieType(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:accessories_types,slug'
        ]);

        $type = new AccessoriesType();
        $type->name = $request->name;
        $type->slug = $request->slug;
        $images = [];
        if ($request->images !== null) {
            foreach ($request->images as $image) {
                if ($image->isValid()) {
                    $filename = $request->title . rand(0, 100) . '.' . $image->extension();
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

    public function removeType($id)
    {
        $accessorie_type = AccessoriesType::find($id);
        if ($accessorie_type) {
            $accessorie_type->delete();
            return redirect()->back()->with('success', 'Accessorie Type deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Invalid Accessorie type for deletion');
        }
    }

    public function AccessoriesAddprocc(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());
        // die();
        // dd($request->all());
        if ($request->id) {
            $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:product_accessories,id,' . $request->id,
                'accessorie_type' => 'required',
                'default_price' => 'required|numeric'
            ]);
            $type = ProductAccessories::find($request->id);
            $type->name = $request->name;
            $type->slug = $request->slug;
            $type->accessories_type = $request->accessorie_type;
            $type->is_printed = $request->Printed;
            $type->description = $request->description;
            $type->price = $request->default_price;
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
                $type->images = json_encode($updatedImages);
            } else {
                $type->images = json_encode($images);
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
                    $var_name = $request->variation_name[$a];
                    $entity = $request->entity_id[$a];
                    $price = $var_name . '_price';
                    $value = $var_name . '_value';

                    for ($i = 0; $i < count($request->$price); $i++) {
                        $variation = new AccessoriesVariations();
                        $variation->name = $var_name;
                        $variation->entity_id = $entity;
                        $variation->accessories_id = $type->id;
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
                'default_price' => 'required|numeric'
            ]);

            $type = new ProductAccessories();
            $type->name = $request->name;
            $type->slug = $request->slug;
            $type->accessories_type = $request->accessorie_type;
            $type->is_printed = $request->Printed;
            $type->description = $request->description;
            $type->price = $request->default_price;
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
            $type->images = json_encode($images);
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
                    $var_name = $request->variation_name[$a];
                    $entity = $request->entity_id[$a];
                    $price = $var_name . '_price';
                    $value = $var_name . '_value';

                    for ($i = 0; $i < count($request->$price); $i++) {
                        $variation = new AccessoriesVariations();
                        $variation->name = $var_name;
                        $variation->entity_id = $entity;
                        $variation->accessories_id = $type->id;
                        $variation->value = $request->$value[$i];
                        $variation->price = $request->$price[$i];
                        $variation->save();
                    }
                }
            }
            return redirect()->back()->with('success', 'data added successfully');
        }
    }

    public function removeAccessories($id)
    {
        $product = ProductAccessories::find($id);
        if ($product) {
            $product->delete();
            $productSizes = AccessoriesSize::where('product_id', $id)->get();
            if ($productSizes) {
                foreach ($productSizes as $size) {
                    $size->delete();
                }
            }
            return redirect()->back()->with('success', 'Product deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Faild to deleted Product');
        }
    }
}
