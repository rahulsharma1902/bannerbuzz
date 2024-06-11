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

        if(isset($request->fontkey) && isset($request->fontvalue)){
            $fontkey = $request->fontkey;
            $fontvalue = $request->fontvalue;

            $fontface = [];
            for($i=0; $i<count($fontkey); $i++){
                $fontfaces = ['key'=>$fontkey[$i],'value'=>$fontvalue[$i]];
                array_push($fontface,$fontfaces);
            }
            $fonts->font_face = json_encode($fontface);
        }
        $fonts->save();

        return back()->with('success','Fonts successfully added');
    }

    public function edit($id){
        $font = Font::find($id);
        return view('admin.fonts.edit',compact('font'));
    }

    public function editProcc(Request $request){
        // dd($request->all()); 

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

            if($request->type == 'remove'){  
                $font = Font::find($request->id);
                $font_face = json_decode($font->font_face);             
                $new_fontface = [];
                foreach($font_face as $key=>$val){
                    if(isset($request->key[$key])){
                        if($key == $request->key[$key]){
                            continue;
                        }
                    }
                    array_push($new_fontface,$val);
                }

                $font->font_face = json_encode($new_fontface);
                $font->update();
            }

            $fonts = Font::find($request->id);
            $fonts->name = $request->name;
            $fonts->path = $filepath;

            if(isset($request->fontkey) && isset($request->fontvalue)){
                if(isset($fonts->font_face)){
                    $updated_fontface = json_decode($fonts->font_face); 
                    $fontkey = $request->fontkey;
                    $fontvalue = $request->fontvalue;
    
                    for($i=0; $i<count($fontkey); $i++){
                        $fontfaces = ['key'=>$fontkey[$i],'value'=>$fontvalue[$i]];
                        array_push($updated_fontface,$fontfaces);
                    }
    
                    $fonts->font_face = json_encode($updated_fontface);
    
                }else{
                    $fontkey = $request->fontkey;
                    $fontvalue = $request->fontvalue;
        
                    $fontface = [];
                    for($i=0; $i<count($fontkey); $i++){
                        $fontfaces = ['key'=>$fontkey[$i],'value'=>$fontvalue[$i]];
                        array_push($fontface,$fontfaces);
                    }
                    
                    $fonts->font_face = json_encode($fontface);
                }
    
            }
            
            $fonts->update();
                    
            return back()->with('success','Fonts update successfully');
        }
    }

    public function delete($id){
        if(isset($id)){
            $font = Font::where('id',$id)->first();
            if(isset($font->path)){
                if(\File::exists(public_path($font->path))){
                    \File::delete(public_path($font->path));
                }
                $fonts = Font::where('id',$id)->delete();
            }
           
            return back()->with('success','Font deleted');
        }
    }
}
