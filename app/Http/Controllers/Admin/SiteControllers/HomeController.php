<?php

namespace App\Http\Controllers\Admin\SiteControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeContent;

class HomeController extends Controller
{
    public function index(){
        $home_content = HomeContent::first();
        return view('admin.site_content.home_page.home_content',compact('home_content'));
    }

    public function Updateprocc(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // die();
        $data = HomeContent::first();
        if($data){
            $request->validate([
                'top_text' => 'required',
                'header_image_url' => 'required',
                'ads_image_1_url' => 'required',
                'ads_image_2_url' => 'required',
                'bottom_title' => 'required',
                'bottom_description' => 'required',
            ]);
            $data->offer_text = $request->offer_text;
            $data->top_text = $request->top_text;
            $data->display_offer = $request->display_offer;
            if ($request->hasFile('header_image')) {
                $image = $request->header_image;
                $filename = 'header_image' .time() . '.' . $image->extension();
                $image->move(public_path() . '/Site_Images/', $filename);
                $data->header_image = $filename;
            }
            $data->header_image_url = $request->header_image_url;
            if ($request->hasFile('ads_image_1')) {
                $image = $request->ads_image_1;
                $filename = 'ads_image_1' .time() . '.' . $image->extension();
                $image->move(public_path() . '/Site_Images/', $filename);
                $data->ads_image_1 = $filename;
            }
            $data->ads_image_1_url = $request->ads_image_1_url;
            if ($request->hasFile('ads_image_2')) {
                $image = $request->ads_image_2;
                $filename = 'ads_image_2' .time() . '.' . $image->extension();
                $image->move(public_path() . '/Site_Images/', $filename);
                $data->ads_image_2 = $filename;
            }
            $data->ads_image_2_url = $request->ads_image_2_url;
            $data->bottom_title = $request->bottom_title;
            $data->bottom_description = $request->bottom_description;
            $data->email = $request->email;
            $data->phone = $request->number;
            $data->address = $request->address;
            $data->facebook = $request->facebook;
            $data->instagram = $request->instagram;
            $data->twitter = $request->twitter;
            $data->whatsapp = $request->whatsapp;
            $data->chatScript = $request->chatScript;

            $data->save();
            return redirect()->back()->with('success','data updated successfully');
        } else {
            $request->validate([
                'header_image' => 'required',
                'header_image_url' => 'required',
                'ads_image_1' => 'required',
                'ads_image_1_url' => 'required',
                'ads_image_2' => 'required',
                'ads_image_2_url' => 'required',
                'bottom_title' => 'required',
                'bottom_description' => 'required'
            ]);

            $data = new HomeContent();
            $data->offer_text = $request->offer_text;
            $data->top_text = $request->top_text;
            $data->display_offer = $request->display_offer;
            if ($request->hasFile('header_image')) {
                $image = $request->header_image;
                $filename = 'header_image' .time() . '.' . $image->extension();
                $image->move(public_path() . '/Site_Images/', $filename);
                $data->header_image = $filename;
            }
            $data->header_image_url = $request->header_image_url;
            if ($request->hasFile('ads_image_1')) {
                $image = $request->ads_image_1;
                $filename = 'ads_image_1' .time() . '.' . $image->extension();
                $image->move(public_path() . '/Site_Images/', $filename);
                $data->ads_image_1 = $filename;
            }
            $data->ads_image_1_url = $request->ads_image_1_url;
            if ($request->hasFile('ads_image_2')) {
                $image = $request->ads_image_2;
                $filename = 'ads_image_2' .time() . '.' . $image->extension();
                $image->move(public_path() . '/Site_Images/', $filename);
                $data->ads_image_2 = $filename;
            }
            $data->ads_image_2_url = $request->ads_image_2_url;
            $data->bottom_title = $request->bottom_title;
            $data->bottom_description = $request->bottom_description;
            $data->email = $request->email;
            $data->phone = $request->number;
            $data->address = $request->address;
            $data->facebook = $request->facebook;
            $data->instagram = $request->instagram;
            $data->twitter = $request->twitter;
            $data->whatsapp = $request->whatsapp;
            $data->chatScript = $request->chatScript;

            $data->save();
            return redirect()->back()->with('success','data added successfully');
        }
    }
}
