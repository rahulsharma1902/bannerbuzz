<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Template;
use App\Models\Clipart;
use App\Models\Shape;
use App\Models\Background;

class CustomizeController extends Controller
{
    //
    public function index(){
        $templates = Template::all();
        $backgrounds = Background::all();
        $cliparts = Clipart::all();
        $shapes = Shape::all();
        // echo '<pre>';
        // print_r($templates);
        // die();
        return view('front.coutumizerTest.index',compact('templates','backgrounds','backgrounds'));
    }
}
