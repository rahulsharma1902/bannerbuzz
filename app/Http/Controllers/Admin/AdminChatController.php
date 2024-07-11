<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminChatController extends Controller
{
    //
    public function chats(Request $request){
        return view('admin.chat.index');
    }
    public function chatWith(Request $request){
        return view('admin.chat.chat');
    }
}
