<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccessoriesType;
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
        $product = ProductAccessories::where('slug', $slug)->first();
        $accessories_type = AccessoriesType::all();
        return view('admin.accessories.add', compact('accessories_type', 'product'));
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
            'slug' => 'required|unique:accessories_types'
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
        if ($request->id) {
            $request->validate([
                'name' => 'required',
                'slug' => 'required',
                // 'images' => 'required',
                'accessorie_type' => 'required',
            ]);
            $type = ProductAccessories::find($request->id);
            $type->name = $request->name;
            $type->slug = $request->slug;
            $type->accessories_type = $request->accessorie_type;
            $type->is_printed = $request->Printed;
            $type->description = $request->description;
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

            return redirect()->back()->with('success', 'data updated successfully');
        } else {
            $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'images' => 'required',
                'accessorie_type' => 'required',
            ]);

            $type = new ProductAccessories();
            $type->name = $request->name;
            $type->slug = $request->slug;
            $type->accessories_type = $request->accessorie_type;
            $type->is_printed = $request->Printed;
            $type->description = $request->description;
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
