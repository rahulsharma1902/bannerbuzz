<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\TemplateCategory;
use App\Models\Background;
use App\Models\BackgroundCategory;

use App\Models\Clipart;
use App\Models\ClipArtCategory;
use App\Models\Shape;
use App\Models\ShapeCategory;

use App\Models\UploadImageTemplate;
use Auth;

class TemplateController extends Controller
{
    public function index(Request $request){
        $templates = Template::all();
        return view('admin.template.index',compact('templates'));
    }
    public function add(Request $request, ?string $slug = null){
        $template = Template::where('slug',$slug)->first();
        $templateCategory = TemplateCategory::all();
        if($template){
             
            return view('admin.template.add',compact('templateCategory','template'));
        } else {
            
            return view('admin.template.add',compact('templateCategory'));
        }
    }
    public function addProcc(Request $request){

        try {
            if($request->id){
                $template = Template::find($request->id);
                if($template){
                    $request->validate([
                        'name' => 'required|unique:templates,name,'.$request->id.',id',
                        'slug' => 'required|unique:templates,slug,'.$request->id.',id',
                        'category_id' => 'required',
                    ]);
                    $template->name = $request->name;
                    $template->slug = $request->slug;
                    $template->category_id = $request->category_id;
                    if ($request->hasFile('image')) {
                        $featuredImage = $request->file('image');
                        $extension = $featuredImage->getClientOriginalExtension();
                        $featuredImageName = 'template_'.rand(0,1000).time().'.'.$extension;;
                        $featuredImage->move(public_path().'/TemplateImage/',$featuredImageName);
                        
                        $template->template_image = $featuredImageName;    
                    }
                    $template->save();
                    return redirect()->to(url("admin-dashboard/template-add/{$request->slug}"));
                }
                
            }else{
                $request->validate([
                    'name' => 'required|unique:templates',
                    'slug' => 'required|unique:templates',
                    'category_id' => 'required',
                ]);
                
                    $template = new Template;
                    $template->name = $request->name;
                    $template->slug = $request->slug;
                    $template->category_id = $request->category_id;
                    

                    if ($request->hasFile('image')) {
                        $featuredImage = $request->file('image');
                        $extension = $featuredImage->getClientOriginalExtension();
                        $featuredImageName = 'template_'.rand(0,1000).time().'.'.$extension;;
                        $featuredImage->move(public_path().'/TemplateImage/',$featuredImageName);
                        
                        $template->template_image = $featuredImageName;    
                    }

                    $template->save();
                    return redirect()->to(url("admin-dashboard/template/{$request->slug}"));
            
            }
        } catch (\Exception $e) {
            // Log the error message to debug
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while adding the template: ' . $e->getMessage());
        }

    }

    public function template($slug){
        if($slug){
            $templateData = Template::where('slug', $slug)->first();
            if($templateData){
                $templates = Template::with('category')->where('id', '!=', $templateData->id ?? '' )->get();
                $templateCategorys = TemplateCategory::all();
                $backgrounds = BackgroundCategory::with('background')->get();
                $shapes = ShapeCategory::with('shape')->get();
                $cliparts = ClipArtCategory::with('clipart')->get();
                $uploadedImages = UploadImageTemplate::where('user_id',Auth::user()->id ?? '')->get();
                // echo '<pre>';
                // print_r($shapes);
                // die();
                // $shapes = Shape::all();
                // $cliparts = Clipart::all();
                return view('admin.template.template',compact('templateCategorys','templateData','shapes','backgrounds','cliparts','templates','uploadedImages'));
            }else{
                return redirect()->back()->with('error','Invalid Template');
            }
        }
    }


    public function uploadImageTemplate(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $allowed_extensions = ['png', 'jpg', 'jpeg'];
    
            if (!in_array($extension, $allowed_extensions)) {
                return response()->json(['success' => false, 'message' => 'Only png, jpeg, and jpg images are allowed']);
            }
    
            $imageName = 'template_'.rand(0,1000).time().'.'.$extension;
            $image->move(public_path().'/UploadImages/', $imageName);
            $uploadImage = new UploadImageTemplate;
            $uploadImage->image = $imageName;
            $uploadImage->user_id = $request->user_id;
            $uploadImage->save();
            return response()->json(['success' => true, 'message' => $imageName]);
        } else {
            return response()->json(['success' => false, 'message' => 'Image upload failed']);
        }
    }




    public function saveTemplate(Request $request){
        $id = $request->id;
        if($id){
            $templateData = Template::where('id', $id)->first();
            $templateData->templateData = $request->templateData;
            $templateData->save();
            return response()->json(['success' => true, 'message' => 'Template Successfully uploaded.']);
        }
        return response()->json(['success' => false, 'message' => 'Failed to upload template']);
    }
    

    public function templateRemove(Request $request, $slug) {
        $slug = $slug; // This line is redundant.
        if ($slug) {
            $template = Template::where('slug', $slug)->first();
            if ($template) {
                $template->delete();
                return redirect()->back()->with('success', 'You template has been removed successfully');
            }
        }
        return redirect()->back()->with('error','Invalid Slug/Request Found !');
    }
    
}
