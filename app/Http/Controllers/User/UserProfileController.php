<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserBilling;
use App\Models\OtpVerification;
use Mail;
use App\Mail\EmailUpdateMail;
use Hash;
use Carbon\Carbon;

class UserProfileController extends Controller
{
    public function profile()
    {
        return view('user_dashboard.profile.profile');
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'first_name' =>'required',
            'last_name' =>'required',
            'phone' =>'required',
        ]);
        $user = Auth::user()->id;
        $userData = User::find($user);
        $userData->first_name = $request->first_name;
        $userData->last_name = $request->last_name;
        $userData->number = $request->phone;

        if(isset($request->otp)){
            $otp_verification = OtpVerification::where('otp',$request->otp)->first();
            if($otp_verification){
                $expire_time = $otpVerfication->expires_at;
                $current_time = Carbon::now();
                $current_time = $current_time->toDateTimeString();
                
                if($expire_time > $current_time){
                    $userData->email = $request->email;
                }
            }
        }
     
        $userData->save();

        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' =>'required',
            'new_password' =>'required',
        ]);

        $user = auth()->user();
        if (!Hash::check($request->current_password, $user->password)) {
            
            return back()->withErrors(['current_password' => 'Current password does not match.']);
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->back()->with('success' , 'password changed successfully');
    }

    public function AddressPage(Request $request)
    {
        $addresses = UserBilling::where('user_id',Auth::user()->id)->get();

        return view('user_dashboard.address.address',compact('addresses'));
    }

    public function addressAddProcess(Request $request)
    {
        
        if($request->id != null) {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                // 'company_name' => 'required',
                'phone_number' => 'required',
                'address' => 'required',
                'additional_address' => 'required',
                'zip_code' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
            ]);
            try {
            
                $userAddress = UserBilling::find($request->id);
                $userAddress->user_id = Auth::user()->id;
                $userAddress->first_name = $request->first_name;
                $userAddress->last_name = $request->last_name;
                $userAddress->email = $request->email;
                $userAddress->company_name = $request->company_name;
                $userAddress->phone_number = $request->phone_number;
                $userAddress->address = $request->address;
                $userAddress->additional_address=$request->additional_address;
                $userAddress->zip_code = $request->zip_code;
                $userAddress->city = $request->city;
                $userAddress->state = $request->state;
                $userAddress->country =  $request->country;
                // $userAddress->additional_info = json_encode($request['additional_info']);
                $userAddress->save();
        
                return redirect()->back()->with('success', 'User address Update successfully');
            } catch (Execption $e) {
                return redirect()->back()->with('error', 'something went wrong ');
            }
        } else {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                // 'company_name' => 'required',
                'phone_number' => 'required',
                'address' => 'required',
                'additional_address' => 'required',
                'zip_code' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
            ]);
            try {
                $user_id   = auth()->user()->id;
            
                $userAddress = new UserBilling();
                $userAddress->user_id = $user_id;
                $userAddress->first_name = $request->first_name;
                $userAddress->last_name = $request->last_name;
                $userAddress->email = $request->email;
                $userAddress->company_name = $request->company_name;
                $userAddress->phone_number = $request->phone_number;
                $userAddress->address = $request->address;
                $userAddress->additional_address=$request->additional_address;
                $userAddress->zip_code = $request->zip_code;
                $userAddress->city = $request->city;
                $userAddress->state = $request->state;
                $userAddress->country =  $request->country;
                // $userAddress->additional_info = json_encode($request['additional_info']);
                $userAddress->save();
        
                return redirect()->back()->with('success', 'User address saved successfully');
            } catch (Execption $e) {
                return redirect()->back()->with('error', 'something went wrong ');
            }
        }
    }

    public function updateEmail(Request $request){
        if(isset($request->email)){
            $users = User::where('email',$request->email)->first();
            
            $otp = rand(100000,999999);
            $otps = new OtpVerification;
            $otps->user_id = $users->id;
            $otps->otp = $otp;
            $otps->otp_type = 'email';
            $otps->expires_at = now()->addMinutes(1);
            $otps->save();

            $mailData = array(
                $users->first_name,
                $users->last_name,
                $users->email,
                $otp
            );

            $mail = Mail::to($users->email)->send(new EmailUpdateMail($mailData));

            return response()->json(['success']);
        }
    }

    public function verifyOtp(Request $request){
        if(isset($request->otp)){
            $otpVerfication = OtpVerification::where('otp',$request->otp)->first();

            if($otpVerfication){
                $expire_time = $otpVerfication->expires_at;
                $current_time = Carbon::now();
                $current_time = $current_time->toDateTimeString();
                
                if($expire_time > $current_time){
                    return response()->json(['success'=>'OTP is verified','code'=>'200']);
                }else{
                    return response()->json(['error'=>'OTP is expired','code'=>'500']);
                }
                
            }else{
                return response()->json(['error'=>'Incorrect OTP','code'=>'500']);
            }
        }
    }
    public function deleteAddress(Request $request){

        // dd($request->id);
        $address = UserBilling::find($request->id);
        if (!$address) {
            return response()->json(['error' => 'Address not found.'], 404);
        }
        $address->delete();

        return response()->json(['message' => 'Address deleted successfully.']);
    }
    public function viewUserAddress(Request $request){

        // dd($request->all());
        $userAddresses = UserBilling::find($request->id);


        // if (!$userAddresses->isEmpty()) {
        //     return view('user_dashboard.address.address', compact('userAddresses'));
        // } else {
        //     return redirect()->back()->with('error', 'User addresses not found.');
        // }
        if(!$userAddresses){
            return response()->json
            (['error' => 'user not found']);
        }else{
            return response()->json(['userAddresses'=>$userAddresses]);
        }
      
    }
}