<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class DesignerController extends Controller
{
    public function index()
    {
        $designers = User::where('is_admin', 2)->get();
        return view('admin.Designers.designer_list',compact('designers'));
    }

    public function AddDesigner()
    {
        return view('admin.Designers.create_designer');
    }

    public function DesignerAddProcc(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'phone' => 'required|unique:users,number'
        ]);

        $user_name = $request->input('first_name') . $request->input('last_name');

        $unique_user_name = $user_name;
        $count = 1;
        while (User::where('user_name', $unique_user_name)->exists()) {
            $unique_user_name = $user_name.++$count;
        }

        // dd($request->password);
        $user = new User();
        $user->user_name = $unique_user_name;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->number = $request->input('phone');
        $user->is_admin = 2;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success','new account added');

        // $mailData = [
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ];
    }
}
