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
}
