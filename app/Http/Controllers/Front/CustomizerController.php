<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

use App\Models\Template;
use App\Models\Clipart;
use App\Models\ClipArtCategory;
use App\Models\Shape;
use App\Models\ShapeCategory;
use App\Models\TemplateCategory;
use App\Models\Background;
use App\Models\BackgroundCategory;
use App\Models\UploadImageTemplate;
use Auth;

use Illuminate\Support\Str;
use Session;

class CustomizerController extends Controller
{
    
    public function index(Request $request, $productSlug, $templateSlug) {
        if (!empty($productSlug) && !empty($templateSlug)) {
            $product = Product::where('slug', $productSlug)->first();
            $templateData = Template::where('slug', $templateSlug)->first();
    
            if ($product && $templateData) {
                $templates = Template::with('category')->where('id', '!=', $templateData->id ?? '' )->get();
                $templateCategorys = TemplateCategory::all();
                $backgrounds = BackgroundCategory::with('background')->get();
                $shapes = ShapeCategory::with('shape')->get();
                $cliparts = ClipArtCategory::with('clipart')->get();
                $uploadedImages = UploadImageTemplate::where('user_id',Auth::user()->id ?? '')->get();
                return view('front.customizer.index', compact('uploadedImages','templateCategorys','product','templateData','templates', 'backgrounds', 'cliparts', 'shapes'));
            }
        }
    
        return abort(404, 'Page Not Found');
    }



    public function saveTemplate(Request $request)
    {
        $sessionId = '';
        if (!Auth::check()) {
            $sessionId = Session::get('sessionId');
        
            if (!$sessionId) {
                $randomString = Str::random(4);
                Session::put('sessionId', $randomString); 
            }        
        }
    
        try {

            


            
            return response()->json(['message' => 'Your template has been successfully saved in the database.'], 200);
        } catch (\Exception $e) {
            Log::error('Failed to save template: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to save the template due to an internal error.'], 500);
        }
    }
    
    
}
