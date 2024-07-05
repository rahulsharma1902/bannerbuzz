<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;
use App\Models\DesignTemplate;
use App\Models\Basket;
use Session;
use Laravel\Socialite\Facades\Socialite;
use App\Models\OtpVerification;
// use App\Mail\UserRegisterMail;
// use App\Mail\ForgottenPassword;
use App\Mail\ForgetPasswordMail;
use Mail;
use Carbon\Carbon;

class AuthenticationController extends Controller
{
    public function index()
    {

        return view('authentication.index');
    }
    public function loginProcc(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            if (Auth::user()->is_admin == 1) {
                return redirect('/admin-dashboard')->with('success', 'Successfully loggedin! Welcome Come Admin');
            } elseif (Auth::user()->is_admin == 0) {
                $changeID = $this->convertTemporaryIdToUserId();
                if ($request->url != null) {
                    return redirect($request->url);
                } else {
                    return redirect('/')->with('success', 'Successfully loggedin');
                }
            } else {
                Auth::logout();
                return redirect()->back()->with('error', 'failed! Something went wrong');
            }
        } else {
            return redirect()->back()->with('error', 'failed to login');
        }
    }

    public function register()
    {

        $countries = [
            'AF' => '93',
            'AL' => '355',
            'DZ' => '213',
        ];
        return view('authentication.new_register', compact('countries'));
    }
    public function registerProcc(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'phone' => 'required|unique:users,number'

        ]);

        $user_name = $request->input('first_name') . $request->input('last_name');

        $unique_user_name = $user_name;
        $count = 1;
        while (User::where('user_name', $unique_user_name)->exists()) {
            $unique_user_name = $user_name . ++$count;
        }
        $user = new User();
        $user->user_name = $unique_user_name;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->number = $request->input('phone');
        $user->password = Hash::make($request->password);
        $user->save();

        $mailData = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        // $mail = Mail::to($request['email'])->send(new UserRegisterMail($mailData)); 
        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->is_admin == 0) {
                $changeID = $this->convertTemporaryIdToUserId();
                if ($request->url != null) {
                    return redirect($request->url);
                } else {
                    return redirect('/')->with('success', 'Your account is created successfully');
                }
            }
        }
        // return redirect('/')->with('success','Your account is created successfully');

    }
    public function forgotPassword()
    {
        return view('authentication.forgotPassword');
    }
    public function forgotProcc(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['error' => 'user not found'], 404);
        }

        $otp = rand(123456, 999999);
        $data['otp'] = $otp;


        $verification = [
            'user_id' => $user->id,
            'otp' => $otp,
            'otp_type' => "forgotpassword",
            'expires_at' => Carbon::now()->addMinutes(5)
        ];

        OtpVerification::updateOrCreate($verification);

        $data = Mail::to($request->email)->send(new ForgetPasswordMail($data));
        return response()->json(['message' => 'OTP has been sent to your email']);
    }
 
    public function otpConfirm(Request $request)
    {
        $otp = $request->input('otp');

        $verificationExists = OtpVerification::where('otp', $otp)
            ->where('expires_at', '>=', Carbon::now()->subMinutes(5))
            ->first();

        if (!$verificationExists) {
            return response()->json(['error' => 'Your OTP is not correct or has expired'], 400);
        }

        $verificationExists->update([
            'expires_at' => Carbon::now()->subMinutes(5) 
        ]);

        return response()->json(['success' => 'Your OTP is confirmed'], 200);
    }

    public function newPasswordCreate(Request $request)
     {
    //    $request->validate([
    //         'password' => 'required|confirmed',
    //     ]);
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        $password = Hash::make($request->password);
    
        $user->password = $password;
        $user->save(); 
        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->is_admin == 0) {
        
                return response()->json(['success' => 'Your new password has been created successfully', 'redirect' => 'admin-dashboard']);
            } else {
           
                return response()->json(['success' => 'Your new password has been created successfully', 'redirect' => '/']);
            }
        }
    
        return response()->json(['error' => 'Failed to authenticate user'], 401);
    }

    public function forgetPasswordSubmit(Request $request)
    {
        $request->validate([
            'username' => 'required'
        ]);
        $user = User::where([['email', $request->username], ['is_admin', 0]])->first();
        if ($user) {
            $secreat_key = base64_encode($request->username);
            $url = url('forgotten-password/newpassword/' . $secreat_key);
            $mailData = [
                'token' => $secreat_key,
                'url' => $url,
            ];
            $mail = Mail::to($request->username)->send(new ForgottenPassword($mailData));
            return redirect()->back()->with('success', 'Success! Password reset link sent to your email');
        } else {
            return redirect()->back()->with('error', 'Failed! this username is not found in our database');
        }
    }

     

    public function newpassword($secret_key = null)
    {

        return view('authentication.newpassword', compact('secret_key'));
    }
    public function newpasswordSubmit(Request $request)
    {
        $request->validate([
            'password' => 'min:6',
            'confirmpassword' => 'required_with:password|same:password|min:6'
        ]);
        $email = base64_decode($request->token);
        $password = Hash::make($request->password);
        // echo $email;
        $user = User::where('email', $email)->first();
        $user->password = $password;
        $user->update();
        return redirect('/login')->with('success', 'Successfully updated password');
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/')->with('success', 'successfully logged out');
    }




    function convertTemporaryIdToUserId()
    {
        $temporaryUserId = Session::get('temporaryUserId');
        if ($temporaryUserId) {
            DesignTemplate::where('temporary_id', $temporaryUserId)->update(['user_id' => Auth::id(), 'temporary_id' => null]);
            Basket::where('temporary_id', $temporaryUserId)->update(['user_id' => Auth::id(), 'temporary_id' => null]);
            Session::forget('temporaryUserId');
        }
        if (!Session::has('temporaryUserId')) {
            return true;
        } else {
            return true;
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect()
    {
        try {
            $googleuser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Google authentication failed.');
        }
        $existingUser = User::where('email', $googleuser->email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {

            $unique_user_name = $googleuser->name;
            $count = 1;
            while (User::where('user_name', $unique_user_name)->exists()) {
                $unique_user_name = $googleuser->name . ++$count;
            }

            // $newUser = User::create([
            //     'user_name' => $unique_user_name,
            //     'first_name' => 'test',
            //     'last_name' => 'user',
            //     'email' => $googleuser->email,
            //     'number' => null,
            //     'is_admin' => 0,
            //     'password' => Hash::make($googleuser->email),

            // ]);

            $newUser = new User();
            $newUser->user_name = $unique_user_name;
            $newUser->first_name = $unique_user_name;
            // $newUser->last_name = 'user';
            $newUser->email = $googleuser->email;
            // $newUser->number =12321312312;
            $newUser->password = Hash::make($googleuser->email);
            $newUser->save();

            Auth::login($newUser);
        }

        if (Auth::user()->is_admin == 1) {
            return redirect('/admin-dashboard')->with('success', 'Successfully loggedin! Welcome Come Admin');
        } elseif (Auth::user()->is_admin == 0) {
            // $changeID =  $this->convertTemporaryIdToUserId();

            return redirect('/')->with('success', 'Successfully loggedin');
        } else {
            abort(404);
        }
    }



    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Facebook authentication failed.');
        }

        print_r($facebookUser);
        die();
        // $existingUser = User::where('email', $facebookUser->email)->first();

        // if ($existingUser) {
        //     Auth::login($existingUser);
        // } else {
        //     $unique_user_name = $facebookUser->name;
        //     $count = 1;
        //     while (User::where('user_name', $unique_user_name)->exists()) {
        //         $unique_user_name =  $facebookUser->name . $count++;
        //     }

        //     $newUser = new User();
        //     $newUser->user_name = $unique_user_name;
        //     $newUser->first_name = $facebookUser->name;
        //     $newUser->email = $facebookUser->email;
        //     $newUser->password = Hash::make($facebookUser->email);
        //     $newUser->save();

        //     Auth::login($newUser);
        // }

        // if (Auth::user()->is_admin == 1) {
        //     return redirect('/admin-dashboard')->with('success', 'Successfully logged in! Welcome Admin');
        // } elseif (Auth::user()->is_admin == 0) {
        //     return redirect('/')->with('success', 'Successfully logged in');
        // } else {
        //     abort(404);
        // }
    }
}
