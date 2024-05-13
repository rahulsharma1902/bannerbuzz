<?php

namespace App\Http\Controllers\Admin\SiteControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUsContent;

class AboutContentController extends Controller
{
    public function index()
    {
        $about_content = AboutUsContent::first();
        return view('admin.site_content.about_us.about_us',compact('about_content'));
    }

    public function UpdateContent(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // die();
        $data = AboutUsContent::first();
        if ($data) {
            if ($request->hasFile('top_section_image')) {
                $image = $request->top_section_image;
                $filename = 'banner_image' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path() . '/Site_Images/', $filename);
                $data->banner_image = $filename;
            }
            $data->header1_title = $request->header_1_title;

            $header1_images_array = json_decode($data->header1_images,true);
            // echo "<pre>";
            // print_r($header1_images_array);
            // die();
            if($request->header1_images){
                $a = 0;
                foreach($request->header1_images as $fname => $value){
                    if(isset($value['images'])){
                        if ($value['images']->isValid()) {
                            $fileNamE = 'about_img'.$a .time() . '.' . $value['images']->getClientOriginalExtension();
                            $value['images']->move(public_path() . '/Site_Images/', $fileNamE);
                            $header1_images_array[$fileNamE] = $value['text'];
                            unset($header1_images_array[$fname]);
                        }

                      
                    } else if(isset($value['text'])){
                        $header1_images_array[$fname] = $value['text'];
                    }
                    $a++;
                }
            }
            $data->header1_images = $header1_images_array;
            $data->header2_title = $request->header_2_title;  
            $data->header2_description = $request->header_2_description;

            $data->employee_name = $request->employee_name;             // employee section
            $data->employee_experience = $request->employee_experience;
            $data->about_employee = $request->about_employee;
            if ($request->hasFile('employee_image')) {
                $image = $request->employee_image;
                $fileName = 'emp' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path() . '/Site_Images/', $fileName);
                $data->employee_image = $fileName;
            }

            $logos_array = json_decode($data->bottom_logos,true);
            if($request->bottom_logos){
                foreach($request->bottom_logos as $key => $logo){
                    if ($logo->isValid()) {
                        $fileName = 'logo_img' .$key.time() . '.' . $logo->getClientOriginalExtension();
                        $logo->move(public_path() . '/Site_Images/', $fileName);
                        if(isset($logos_array[$key])){
                            $logos_array[$key] = $fileName;
                        }
                    }
                }
            }
            $data->bottom_logos = json_encode($logos_array);

            $bottom2_images_array = json_decode($data->bottom2_images,true);
            if($request->bottom2_images){
                foreach($request->bottom2_images as $key => $img){
                    if ($img->isValid()) {
                        $fileNAme = 'banner' .$key.time() . '.' . $img->getClientOriginalExtension();
                        $img->move(public_path() . '/Site_Images/', $fileNAme);
                        if(isset($logos_array[$key])){
                            $bottom2_images_array[$key] = $fileNAme;
                        } else {
                            $bottom2_images_array[$key] = $fileNAme;
                        }
                    }
                }
            }
            $data->bottom2_images = json_encode($bottom2_images_array);
            $data->bottom2_image_title =json_encode($request->bottom2_image_title);
            $data->bottom2_image_text = json_encode($request->bottom2_image_text);
            $data->save();
            return redirect()->back()->with('success', 'data updated successfully');

        } else {

            $data = new AboutUsContent();
            // banner image
            if ($request->hasFile('top_section_image')) {
                $image = $request->top_section_image;
                $filename = 'banner_image' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path() . '/Site_Images/', $filename);
                $data->banner_image = $filename;
            }

            $data->header1_title = $request->header_1_title;             // header  section
             $data1 = [];
            if (!empty($request->header_1_image) && !empty($request->header_image_text)) {
                for ($i = 0; $i < count($request->header_1_image); $i++) {
                    if ($request->header_1_image[$i]->isValid()) {
                        $image = $request->header_1_image[$i];
                        $filename = 'about-us' . $i . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path() . '/Site_Images/', $filename);
                        $text = $request->header_image_text[$i];
                        $data1[$filename] = $text;
                    }
                }
            }
            $data->header1_images =json_encode($data1) ;
            $data->header2_title = $request->header_2_title;  
            $data->header2_description = $request->header_2_description;
           
            $data->employee_name = $request->employee_name;             // employee section
            $data->employee_experience = $request->employee_experience;
            $data->about_employee = $request->about_employee;
            if ($request->hasFile('employee_image')) {
                $image = $request->employee_image;
                $fileName = 'emp' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path() . '/Site_Images/', $fileName);
                $data->employee_image = $fileName;
            }

            $data->bottom1_title = $request->bottom_1_title;      // bottom section 1
            $data->bottom1_description = $request->bottom_1_description;
            $logos = [];
            if (!empty($request->bottom_1_logos)) {
                foreach ($request->bottom_1_logos as $key=> $logo) {
                    if ($logo->isValid()) {
                        $fileName = 'logo_img' .$key.time() . '.' . $logo->getClientOriginalExtension();
                        $logo->move(public_path() . '/Site_Images/', $fileName);
                        $logos[] = $fileName;
                    }
                }
            }
            $data->bottom_logos = json_encode($logos);
            
            $data->bottom2_title = $request->bottom_2_title;           // bottom 2 section
            $data->bottom2_subtitle = $request->bottom_2_subtitle;
            $imgs = [];
            if (!empty($request->bottom_2_images)) {
                foreach ($request->bottom_2_images as $key => $img) {
                    if ($img->isValid()) {
                        $fileNAme = 'banner' .$key.time() . '.' . $img->getClientOriginalExtension();
                        $img->move(public_path() . '/Site_Images/', $fileNAme);
                        $imgs[] = $fileNAme;
                    }
                }
            }
            $data->bottom2_images = json_encode($imgs);
            $data->bottom2_image_title =json_encode($request->bottom2_image_title);
            $data->bottom2_image_text = json_encode($request->bottom2_image_text);

            $data->save();
            return redirect()->back()->with('success', 'data added successfully');
        }
    }
}
