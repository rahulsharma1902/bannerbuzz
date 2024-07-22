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
use App\Models\DesignTemplate;
use App\Models\shareArtwork;
use App\Models\UploadImageTemplate;
use App\Models\Font;
use App\Mail\ShareArtworkMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Session;

use GuzzleHttp\Client;

class CustomizerController extends Controller
{
    
    // public function index(Request $request, $productSlug, $templateSlug) {
    //     if (!empty($productSlug) && !empty($templateSlug)) {
    //         $product = Product::where('slug', $productSlug)->first();
    //         $templateData = Template::where('slug', $templateSlug)->first();
    
    //         if ($product && $templateData) {
    //             $templates = Template::with('category')->where('id', '!=', $templateData->id ?? '' )->get();
    //             $templateCategorys = TemplateCategory::all();
    //             $backgrounds = BackgroundCategory::with('background')->get();
    //             $shapes = ShapeCategory::with('shape')->get();
    //             $cliparts = ClipArtCategory::with('clipart')->get();
    //             $uploadedImages = UploadImageTemplate::where('user_id',Auth::user()->id ?? '')->get();
    //             return view('front.customizer.index', compact('uploadedImages','templateCategorys','product','templateData','templates', 'backgrounds', 'cliparts', 'shapes'));
    //         }
    //     }
    
    //     return abort(404, 'Page Not Found');
    // }

    public function index(Request $request, $id) {
        
        if (!empty($id)) {
            $templateData = DesignTemplate::where('id',$id)->with('product')->first();
        
            if ($templateData) {
                $templates = Template::with('category')->where('id', '!=', $templateData->id ?? '' )->get();
                $templateCategorys = TemplateCategory::all();
                $backgrounds = BackgroundCategory::with('background')->get();
                $shapes = ShapeCategory::with('shape')->get();
                $cliparts = ClipArtCategory::with('clipart')->get();
                $uploadedImages = UploadImageTemplate::where('user_id',Auth::user()->id ?? '')->get();
                $fonts = Font::all();
                return view('front.customizer.index', compact('fonts','uploadedImages','templateCategorys','templateData','templates', 'backgrounds', 'cliparts', 'shapes'));
            }
        }
    
        return abort(404, 'Page Not Found');
    }

    public function uploadWrtworkData(Request $request){
        return response()->json($request->all());
    }
    public function saveTemplate(Request $request)
    {
        $design_id = $request->design_id;
       
        if($design_id != null){
            $template = DesignTemplate::find($design_id);
            $imageName = null ;
            $imageIndex = null;
            if($template){
                if($request->action == 'finalSave') {
                    $template->design_method = $request->design_method;
                    // $template->name = $request->name ?? ""; 
                    $template->width = $request->width ?? null;
                    $template->height = $request->height ?? null;
                    $template->dimension = $request->dimension;
                    $template->product_id = $request->product_id;
                    $template->variations = $request->variations;
                    $template->qty = $request->qty;
                    $template->size_id = $request->size_id ?? null;
                    $template->save();
                    $imageArray = json_decode($template->image, true);
                    return response()->json(['template' => $template,'imageName'=> $imageName ,'imgIndex'=> $imageName], 201);
                } else {

                    $imageArray = json_decode($template->image, true);
                    if ($request->hasFile('image')) {
                        $featuredImage = $request->file('image');
                        $extension = $featuredImage->getClientOriginalExtension();
                        $imageName = 'image_'.rand(0,1000).time().'.'.$extension;;
                        $featuredImage->move(public_path().'/designImage/',$imageName);
                        
                        $imageArray[$imageName] = $imageName;

                        $template->image = json_encode($imageArray);
                        

                        // $imageIndex = count($imageArray) - 1;
                      
                        // return response()->json(['template' => $template,'imageName'=> $imageName ,'imgIndex'=> $imageName], 201);
                    }
                    if($request->images){
                        $template->image = $request->images; 
                        $imageArray = $request->images;
                    } else {
                        $imageArray = null;
                    }
                    $template->save();
                    return response()->json(['template' => $template,'imageName'=> $imageName ,'imgIndex'=> $imageName,'imageArray'=>$imageArray], 201);
                }
            }
        } else {

            $temporaryUserId = '';
            $userId = '';
            $userType = '';
        
            $template_data = Template::find($request->template_id);
            if (!Auth::check()) {
                $temporaryUserId = Session::get('temporaryUserId');
                if (!$temporaryUserId) {
                    $temporaryUserId = (string) Str::uuid();
                    Session::put('temporaryUserId', $temporaryUserId);
                }
                $userType = 'Guest';
            } else {
                $userType = 'User';
                $userId = Auth::id();
            }
        
            $action = $request->action;
            $template = null;
        
            if ($action === 'save' && $request->templateId) {
                if ($userType == 'User') {
                    $template = DesignTemplate::where('id', $request->templateId)
                        ->where('user_id', $userId)
                        ->first();
                } else {
                    $template = DesignTemplate::where('id', $request->templateId)
                        ->where('temporary_id', $temporaryUserId)
                        ->first();
                }
            }
        
            if (!$template) {
                $template = new DesignTemplate();
                $template->qty = $request->qty;
            }
        
            $template->design_method = $request->design_method;
            $template->name = $request->name ?? ""; 
            $template->width = $request->width ?? null;
            $template->height = $request->height ?? null;
            $template->dimension = $request->dimension;
            $template->product_id = $request->product_id;
            $template->variations = $request->variations;
            $template->additional_info = $request->design_description ?? '';
            // $template->qty = $request->qty;
            $template->size_id = $request->size_id ?? null;
            if($request->template_id){
                $template->template_data = $template_data->templateData;
            } else {
                $template->template_data = $request->template_data ?? null; 
            }
        
            if (Auth::check()) {
                $template->user_id = $userId;
            } else {
                $template->temporary_id = $temporaryUserId;
            }
            $template->status = $request->status;

            if($request->design_method == 'Artwork') {
                if ($request->hasFile('image')) {
                    $featuredImage = $request->file('image');
                    $extension = $featuredImage->getClientOriginalExtension();
                    $imageName = 'image_'.rand(0,1000).time().'.'.$extension;;
                    $featuredImage->move(public_path().'/designImage/',$imageName);
                    $imageArray[$imageName] = $imageName;
                    $template->image = json_encode($imageArray);   

                    // $imageIndex = count($imageArray) - 1;
                } else {
                    $imageName = null ;
                    $imageIndex = null;
                }

                if($request->images){
                    $template->image = $request->images; 
                    $imageArray = $request->images;
                } else {
                    $imageArray = null;
                }

                $template->save();
        
                return response()->json(['template' => $template,'imageName'=> $imageName,'imgIndex'=>$imageName,'imageArray'=>$imageArray], 201);
            } else {
            
                if ($request->has('image')) {
                    $imageData = $request->input('image');
                    $extension = 'png';
                    $imageName = $template->id . '_image_' . uniqid() . '.' . $extension;
                    $imagePath = 'designImage/' . $imageName;
                    file_put_contents(public_path($imagePath), base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData)));
                    $template->image = $imageName;
                } else {
                    $imagePath = null ;
                }
                $template->save();
        
                return response()->json(['template' => $template], 201);
            }
        }
    }

    public function updateDesign(Request $request)
    {
        $design_id = $request->design_id;
        $imageIndex = $request->ImageIndex;
        if($design_id != null){
            $template = DesignTemplate::find($design_id);
            if($template){
                $imageArray = json_decode($template->image, true);

                if (array_key_exists($imageIndex, $imageArray)) {
                    unset($imageArray[$imageIndex]);
                }
                $imagePath = public_path('designImage/'. $imageIndex) ;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                } 
                $arrayCount = count($imageArray);
                if($arrayCount < 1 && $request->is_saved == false){
                    $template->delete();
                } else {
                    $template->image = json_encode($imageArray);
                    $template->save();
                }
                return response()->json(['arrayCount'=>$arrayCount,'$imageArray'=>$imageArray]);
            }
            return response()->json(false);
        }
    }


    public function deleteTemplate($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $template = DesignTemplate::where('id', $id)->where('user_id', $userId)->first();
        } else {
            $temporaryUserId = Session::get('temporaryUserId');
            $template = DesignTemplate::where('id', $id)->where('temporary_id', $temporaryUserId)->first();
        }
    
        if ($template) {
            $template->delete();
            return redirect()->back()->with('success','Your design has been deleted');
        }

        return redirect()->back()->with('error','Your are not abel to delete design');

    }
    

    public function mySavedDesigns()
    {
        $userType = Auth::check() ? 'User' : 'Guest';

        $userId = Auth::id();
        $temporaryUserId = Session::get('temporaryUserId');
    
        if (!$temporaryUserId && $userType === 'Guest') {
            $temporaryUserId = (string) Str::uuid();
            Session::put('temporaryUserId', $temporaryUserId);
        }
    
        $templatesQuery = DesignTemplate::where('status', 1);
    
        if ($userType === 'User') {
            $templatesQuery->where('user_id', $userId);
        } else {
            $templatesQuery->where('temporary_id', $temporaryUserId);
        }
    
        $templates = $templatesQuery->get();
        return view('front.my-saved-designs.index', compact('templates'));
    }
    
    public function OverViewPage($id)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $template = DesignTemplate::where('id', $id)->where('user_id', $userId)->first();
        } else {
            $temporaryUserId = Session::get('temporaryUserId');
            if($temporaryUserId != null) {
                $template = DesignTemplate::where('id', $id)->where('temporary_id', $temporaryUserId)->first();
            } else {
                $template = null;
            }
        }

        if($template != null){
            $product = Product::find($template->product_id);
            $templates = Template::with('category')->get();
            $related_product = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
        
            return view('front.review-design.index', compact('template','product','templates','related_product'));
        } else {
            abort(404);
        }
    }
    
    
    public function shareArtwork(Request $request)
    {
        $request->validate([
            'sendername' => 'required|string|max:255',
            'senderemail' => 'required|email|max:255',
            'sendernotes' => 'nullable|string',
            'image' => 'nullable|string',
        ]);
    
        $shareArtwork = new ShareArtwork;
    
        $image = null;
        if ($request->has('image')) {
            $imageData = $request->input('image');
            $extension = 'png';
            $imageName = 'shared_image_' . uniqid() . '.' . $extension;
            $imagePath = 'shareMailImage/' . $imageName;
            file_put_contents(public_path($imagePath), base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData)));
            $image = $imagePath;
        }
    
        $mailData = [
            'name' => $request->input('sendername'),
            'email' => $request->input('senderemail'),
            'notes' => $request->input('sendernotes'),
            'image' => $image,
        ];
    
        $shareArtwork->sendername = $request->input('sendername');
        $shareArtwork->senderemail = $request->input('senderemail');
        $shareArtwork->sendernotes = $request->input('sendernotes');
        $shareArtwork->image = $image;
        $shareArtwork->save();
    
        Mail::to($request->input('senderemail'))->send(new ShareArtworkMail($mailData));
    
        return response()->json(['message' => 'Artwork shared successfully.'], 200);
    }
    
    // dropbox upload files
    // public function uploadFile(Request $request)
    // {
    //     $files = $request->input('files');
    //     $fileNames=[];
    //     foreach ($files as $file) {
    //         $fileName = time() . '_' . basename($file['name']);

    //         $fileNames[$fileName]= $fileName;

    //         $fileUrl = $file['link'];
    //         $response = Http::get($fileUrl);

    //         if ($response->successful()) {
    //             $fileContent = (string) $response->getBody();

    //             // return file_get_contents($fileUrl);
    //             file_put_contents(public_path('designImage/'.$fileName),  $fileContent);
    //         } 
    //     }
    //     return response()->json(['message' => 'Files uploaded successfully', 'files' => $fileNames]);
    // }

  
    public function uploadFile(Request $request)
    {
        $files = $request->input('files');
        $fileNames=[];
        foreach ($files as $file) {
       
            $fileUrl = $file;
            $response = Http::get($fileUrl);
            // return $response;
            if ($response->ok()) {
                $fileContent = $response->body();
                
                $contentType = $response->header('Content-Type');
                // if ($contentType) {
                //     $mimeParts = explode('/', $contentType);
                //     $ext = explode('+', end($mimeParts))[0];
                // }
                $urlPath = parse_url($fileUrl, PHP_URL_PATH);
                $ext = pathinfo($urlPath, PATHINFO_EXTENSION);
        
                if (!$ext) {
                    $contentDisposition = $response->header('Content-Disposition');
                    if ($contentDisposition) {
                        preg_match('/filename="([^"]+)"/', $contentDisposition, $matches);
                        if (isset($matches[1])) {
                            $ext = pathinfo($matches[1], PATHINFO_EXTENSION);
                        }
                    }
                }
        
                if (!$ext && $contentType) {
                    $mimeParts = explode('/', $contentType);
                    $ext = explode('+', end($mimeParts))[0];
                }
        
                if (!$ext) {
                    $ext = 'bin';
                }

                $fileName = 'img_'.rand().'_' . time().'.'.$ext;

                $fileNames[$fileName]= $fileName;

                // return file_get_contents($fileUrl);
                file_put_contents(public_path('designImage/'.$fileName),  $fileContent);
            } 
        }
        return response()->json(['message' => 'Files uploaded successfully', 'files' => $fileNames]);
    }



    public function companionDropbox(Request $request)
    {
      if (!$request->has('code')) {
        $clientId = 'jybb2475agaci2j';
        $redirectUri = 'https://cre8iveprinter.co.uk/companion/dropbox/redirect';
        $scopes = ['files_metadata_read', 'files_metadata_write', 'files_read', 'files_write'];
    
        $authUrl = 'https://www.dropbox.com/oauth2/authorize?' .
          'client_id=' . $clientId .
          '&redirect_uri=' . urlencode($redirectUri) .
          '&response_type=code' .
          '&scope=' . implode(' ', $scopes);
    
        return redirect($authUrl);
      } else {
        // Handle the redirect from Dropbox with the authorization code
        $code = $request->input('code');
        $clientId = 'jybb2475agaci2j';
        $clientSecret = 'pqqxnouyqco0cpm';
        $redirectUri = 'https://cre8iveprinter.co.uk/companion/dropbox/redirect';
    
        $tokenUrl = 'https://www.dropbox.com/oauth2/token';
        $headers = [
          'Content-Type' => 'application/x-www-form-urlencoded',
        ];
        $data = [
          'grant_type' => 'authorization_code',
          'code' => $code,
          'redirect_uri' => $redirectUri,
          'client_id' => $clientId,
          'client_secret' => $clientSecret,
        ];
    
        $response = json_decode(Http::post($tokenUrl, $headers, $data), true);
        $accessToken = $response['access_token'];
    
        // Store the access token securely
        // ...
    
        return redirect()->route('uppy_dashboard');
      }
    }



// CompanionController.php

public function companionDropboxAuth(Request $request)
{
    // Redirect the user to the Dropbox authorization URL
    $clientId = env('DROPBOX_CLIENT_ID');
    $redirectUri = url('/companion/callback');
    $state = Str::random(40); // Generate a random state token
    session(['dropbox_state' => $state]);
    $authUrl = "https://www.dropbox.com/oauth2/authorize?client_id=$clientId&redirect_uri=$redirectUri&response_type=code&state=$state";
    return redirect($authUrl);
}

public function companionDropboxCallBack(Request $request)
{
    // Handle the redirect back from Dropbox
    $code = $request->input('code');
    $state = $request->input('state');
    if (!session()->has('dropbox_state') || $state !== session('dropbox_state')) {
        // CSRF attack detected, abort
        return response()->json(['error' => 'Invalid state'], 401);
    }
    $clientId = env('DROPBOX_CLIENT_ID');
    $clientSecret = env('DROPBOX_CLIENT_SECRET');
    $redirectUri = url('/companion/callback');

    $client = new Client();
    $response = $client->post('https://www.dropbox.com/oauth2/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => $redirectUri,
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
        ],
    ]);

    $accessToken = json_decode($response->getBody()->getContents(), true)['access_token'];

    // Store the access token in a secure manner (e.g., in a session or a secure storage)
    session(['dropbox_access_token' => $accessToken]);

    // Return a success response to Uppy
    return response()->json(['success' => true]);
}
    


public function upload(Request $request)

    {
        // return $request->all();
        // Get the uploaded file
        $file = $request->file('file');

        // Store the file in the default storage disk (e.g. public/uploads)
        $filename = $file->store('uploads', 'public');

        // Return the uploaded file URL
        return response()->json(['url' => Storage::url($filename)]);
    }
}
