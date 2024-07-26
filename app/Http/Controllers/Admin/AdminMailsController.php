<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class AdminMailsController extends Controller
{
    //
    public function contactUs(){
        // $contactUs = ContactUs::where('status',1)->get();
        $contactUs = ContactUs::all();
        // $contactUs = ContactUs::all()->toArray();
        // echo '<pre>';
        // print_r($contactUs);
        // die();
        return view('admin.mail.MailsDashbord.contactUs',compact('contactUs'));
    }
    public function markDone(Request $request,$id){
        if($id){
            $contactUs = ContactUs::find($id);
            $contactUs->status = 0;
            $contactUs->save();
            return redirect()->back()->with('success','Marked Done');
        }
        return redirect()->back()->with('error','Faield to find Data');
    }

    public function downloadArtwork(Request $request, $id) {
        $contact = ContactUs::findOrFail($id);
        $images = json_decode($contact->images);
    
        if (empty($images)) {
            return redirect()->back()->with('error', 'No images found for this artwork.');
        }
    
        $zip = new \ZipArchive();
        $zipFileName = 'Artwork_' . $contact->id . '.zip';
    
        if ($zip->open(public_path($zipFileName), \ZipArchive::CREATE) === TRUE) {
            foreach ($images as $image) {
                $filePath = public_path('ContactReport/' . $image);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, $image);
                }
            }
            $zip->close();
        } else {
            return redirect()->back()->with('error', 'Could not create ZIP file.');
        }
    
        return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);
    }
    
}
