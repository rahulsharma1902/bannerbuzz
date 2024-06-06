<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Font;

class FontController extends Controller
{
    public function index(){
        $fonts = Font::get();
        return view('admin.fonts.index',compact('fonts'));
    }

    public function add(){
        return view('admin.fonts.font');
    }

    public function addProcc(Request $request){
        $fonts = new Font;
        $fonts->name = $request->name;

        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $path = $file->move(public_path('coustomizer/font'), $filename);

            $filepath = 'coustomizer/font/'.$filename;
            $fonts->path = $filepath;
        }
        
        $fonts->save();
        
        return back()->with('success','Fonts successfully added');
    }

    public function edit($id){
        $font = Font::find($id);
        return view('admin.fonts.edit',compact('font'));
    }

    public function editProcc(Request $request){
        if(isset($request->id)){
            $font = Font::find($request->id);

            if($request->hasFile('file')){
                $file = $request->file('file');
                $filename = $file->getClientOriginalName();
                $path = $file->move(public_path('coustomizer/font'), $filename);
                $filepath = 'coustomizer/font/'.$filename;

            }else{
                $filepath = $font->path;
            }

            $fonts = Font::find($request->id);
            $fonts->name = $request->name;
            $fonts->path = $filepath;
            $fonts->update();

            return back()->with('success','Fonts update successfully');
        }
    }

    public function delete($id){
        if(isset($id)){
            $font = Font::where('id',$id)->delete();
            return back()->with('success','Font deleted');
        }
    }
}
