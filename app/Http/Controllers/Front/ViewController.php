<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        return view('front.Dashboard.index');
    }

    public function shop()
    {
        return view('front.shop.index');
    }
}
