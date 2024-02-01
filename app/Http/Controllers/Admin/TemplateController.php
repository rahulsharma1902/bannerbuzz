<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\TemplateCategory;
use App\Models\Background;
use App\Models\Clipart;
use App\Models\Shape;


class TemplateController extends Controller
{
    public function index(Request $request){
        $templates = Template::all();
        return view('admin.template.index',compact('templates'));
    }
    public function add(Request $request){
        $templateCategory = TemplateCategory::all();
        return view('admin.template.add',compact('templateCategory'));
    }
    public function addProcc(Request $request){

        $request->validate([
            'name' => 'required|unique:templates',
            'slug' => 'required|unique:templates',
            'category_id' => 'required',
        ]);
        try {
            $template = new Template;
            $template->name = $request->name;
            $template->slug = $request->slug;
            $template->category_id = $request->category_id;
            

            if ($request->hasFile('image')) {
                $featuredImage = $request->file('image');
                $extension = $featuredImage->getClientOriginalExtension();
                $featuredImageName = 'template_'.rand(0,1000).time().'.'.$extension;;
                $featuredImage->move(public_path().'/TemplateImage/',$featuredImageName);
                
                $template->image = $featuredImageName;    
            }

            $template->save();
            // return redirect()->back()->with('success','Template added succefully.');
            return redirect()->to(url("admin-dashboard/template/{$request->slug}"));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while adding the Clipart.');
        }
        // echo '<pre>';
        // print_r($request->all());
        // die();
    }

    public function template($slug){
        if($slug){
            $templateData = Template::where('slug', $slug)->first();
            if($templateData){
                $templates = Template::all();
                $backgrounds = Background::all();
                $shapes = Shape::all();
                $cliparts = Clipart::all();
                return view('admin.template.template',compact('templateData','shapes','backgrounds','cliparts','templates'));
            }else{
                return redirect()->back()->with('error','Invalid Template');
            }
        }
    }
}
