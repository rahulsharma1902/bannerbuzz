<?php

namespace App\Http\Controllers\Admin\SiteControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Models\TermsAndConditions;
class PrivacyPolicyController extends Controller
{
    //
    public function privacyPolicy(){
        $privacyPolicy = PrivacyPolicy::first();

        return view('admin.site_content.privacyPolicy.index',compact('privacyPolicy'));
    }


    public function processPrivacyPolicy(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);
    
        $policy = PrivacyPolicy::first();
    
        if ($policy) {
            $policy->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);
        } else {
            PrivacyPolicy::create([
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }
    
        return redirect()->back()->with('success', 'Privacy Policy updated successfully.');
    }





    public function termsAndConditions(){
        $termsAndConditions = TermsAndConditions::first();

        return view('admin.site_content.privacyPolicy.termsAndConditions',compact('termsAndConditions'));
    }


    public function processTermsAndConditions(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);
    
        $termsAndConditions = TermsAndConditions::first();
    
        if ($termsAndConditions) {
            $termsAndConditions->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);
        } else {
            TermsAndConditions::create([
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }
    
        return redirect()->back()->with('success', 'Terms And Conditions updated successfully.');
    }
    
}
