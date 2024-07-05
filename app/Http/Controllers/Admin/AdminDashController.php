<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

use Laravel\Socialite\Facades\Socialite;
class AdminDashController extends Controller
{
    public function index(){

        return view('admin.dashboard.index');
    }

    public function profile()
    {
        return view('admin.profile.index');
    }

    //update profile
    public function ProfileUpdateProcc(Request $request)
    {    
        $request->validate([
            'user_name'=>'required',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'number' => 'required|unique:users,number,' . Auth::user()->id,
        ]);
       
        $user = User::find(Auth::user()->id);
    
        $user->update([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'number' => $request->number,
        ]);

        
        return redirect()->back()->with('success','Your profile has been updated');
    }

    public function updatePasswordProcc(Request $request)
    {
        $request->validate(
            [
                'old_password' => 'required',
                'new_password' => 'required|confirmed|min:6',
                'new_password_confirmation' => 'required'
            ],
            [
                'old_password.required' => 'The password field is required.',
                'new_password.required' => 'The password field is required.',
                'new_password.confirmed' => 'The password confirmation does not match.',
                'new_password.min' => 'The password must be at least :min characters.',
                'new_password_confirmation.required' => 'The password confirmation field is required.',
            ]
        );

        $user = User::find(Auth::user()->id);
        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            return redirect()->back()->with('success', 'Password updated successfully.');
        }

        return redirect()->back()->with(['error' => 'The old password is incorrect.']);
    }

    public function orders()
    {
        $orders = Order::all();
        return view('admin.Orders.order_list',compact('orders'));
    }
    public function orderDetail($order_num)
    {
        $order = Order::where('order_number',$order_num)->first();
        return view('admin.Orders.order_detail',compact('order'));
    }

    public function changeOrderState(Request $request){
        if(isset($request->order_id)){
            $order = Order::find($request->order_id);
            if(isset($request->order_state)){
                $order->order_state = $request->order_state;
                $order->update();
            }
            return response()->json(['success'=>true]);
        }
    }




    // Code for change env file data : 

        public function SiteKey()
        {
            $envArray = $this->parseEnvFile();
            return view('admin.site_keys.add_key', compact('envArray'));
        }
    
        public function UpdateKey(Request $request)
        {
            $envPath = base_path('.env');
            $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $requestKeys = $request->except('_token');
    
            foreach ($lines as &$line) {
                if (strpos(trim($line), '#') === 0 || strpos(trim($line), '=') === false) {
                    continue; // Skip comments and lines without '='
                }
    
                list($key, $value) = explode('=', $line, 2);
                $key = trim($key);
    
                if (array_key_exists($key, $requestKeys)) {
                    $line = "{$key}={$requestKeys[$key]}";
                    unset($requestKeys[$key]);
                }
            }
    
            // Add any new keys that were in the request but not in the .env file
            foreach ($requestKeys as $key => $value) {
                $lines[] = "{$key}={$value}";
            }
    
            file_put_contents($envPath, implode("\n", $lines) . "\n");
    
            return redirect()->back()->with('success', 'Settings updated successfully!');
        }
    
        private function parseEnvFile()
        {
            $envPath = base_path('.env');
            $envArray = [];
    
            if (file_exists($envPath)) {
                $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
                foreach ($lines as $line) {
                    if (strpos(trim($line), '#') === 0 || strpos(trim($line), '=') === false) {
                        continue; // Skip comments and lines without '='
                    }
    
                    list($key, $value) = explode('=', $line, 2);
                    $envArray[trim($key)] = trim($value);
                }
            }
    
            return $envArray;
        }




        public function facebookCallback()
{
    try {
        $facebookUser = Socialite::driver('facebook')->user();
    } catch (\Exception $e) {
        return redirect('/login')->with('error', 'Facebook authentication failed.');
    }


    $existingUser = User::where('email', $facebookUser->email)->first();

    if ($existingUser) {
        Auth::login($existingUser);
    } else {
        $unique_user_name = $facebookUser->name;
        $count = 1;
        while (User::where('user_name', $unique_user_name)->exists()) {
            $unique_user_name =  $facebookUser->name . $count++;
        }

        $newUser = new User();
        $newUser->user_name = $unique_user_name;
        $newUser->first_name = $facebookUser->name;
        $newUser->email = $facebookUser->email;
        $newUser->password = Hash::make($facebookUser->email);
        $newUser->save();

        Auth::login($newUser);
    }

    if (Auth::user()->is_admin == 1) {
        return redirect('/admin-dashboard')->with('success', 'Successfully logged in! Welcome Admin');
    } elseif (Auth::user()->is_admin == 0) {
        return redirect('/')->with('success', 'Successfully logged in');
    } else {
        abort(404);
    }
}
}
