<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Template;
use App\Models\Background;

class CustomizeController extends Controller
{
    //
    public function index(){
        $templates = Template::all();
        $backgrounds = Background::all();
        // echo '<pre>';
        // print_r($templates);
        // die();
        return view('front.coutumizerTest.index',compact('templates','backgrounds'));
    }
}
