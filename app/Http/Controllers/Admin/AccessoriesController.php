<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccessoriesType;
use Illuminate\Http\Request;

class AccessoriesController extends Controller
{
    public function index()
    {
        return view('admin.accessories.index');
    }

    public function addAccessorie()
    {
        $accessories_type = AccessoriesType::all();
        return view('admin.accessories.add',compact('accessories_type'));
    }

    public function AccessoriesType()
    {
        $accessories_type = AccessoriesType::all();
        return view('admin.accessories_type.index',compact('accessories_type'));
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

        return redirect()->back()->with('success','Accessories type added successfully');
    }

    public function removeType($id){
        $accessorie_type = AccessoriesType::find($id);
        if($accessorie_type) {
            $accessorie_type->delete();
            return redirect()->back()->with('success','Accessorie Type deleted successfully');
        } else {
            return redirect()->back()->with('error','Invalid Accessorie type for deletion');
        }
    }
}
