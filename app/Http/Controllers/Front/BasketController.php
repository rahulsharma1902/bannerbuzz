<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\DesignTemplate;
use Auth;
use Session;
use Illuminate\Support\Str;

class BasketController extends Controller
{
    public function AddToBasket(Request $request)
    {
        if($request->product_type != 'accessories'){
            $design_id = $request->design_id;
            $qty = $request->qty;
            $temporaryUserId = null;
            $userId = null;
            $userType = null;
            $designData = DesignTemplate::find($design_id);

            if (!Auth::check()) {
                $temporaryUserId = Session::get('temporaryUserId');
                if (!$temporaryUserId) {
                    $temporaryUserId = (string) Str::uuid();
                    Session::put('temporaryUserId', $temporaryUserId);
                }
                $userType = 'Guest';
                
            } else {
                $userType = 'User';
                $userId = Auth::id();
            }
            if( $userType == 'User' ) {
                $basket = Basket::where('design_id',$design_id)->where('user_id',$userId)->where('status',false)->first();
            } else {
                $basket = Basket::where('design_id',$design_id)->where('temporary_id',$temporaryUserId)->where('status',false)->first();
            }
            
            if(!$basket) {
                $basket = new Basket();
            
            } 
            $basket->user_id = $userId;
            $basket->temporary_id = $temporaryUserId;
            $basket->name = $designData->name ?? null; 
            $basket->width = $designData->width ?? null;
            $basket->height = $designData->height ?? null;
            $basket->dimension = $designData->dimension;
            // $basket->size_type =  $designData->size_type;
            $basket->images =  $designData->image;
            $basket->design_method = $designData->design_method;
            $basket->product_id = $designData->product_id;
            $basket->variations = $designData->variations;
            $basket->size_id = $designData->size_id ?? null;
            $basket->template_data = $designData->template_data;
            // $basket->price = $designData->price;
            $basket->design_id =  $design_id;
            $basket->qty = $qty;
            $basket->save();
        } else {
            $qty = $request->qty;
            $temporaryUserId = null;
            $userId = null;
            $userType = null;
            // $designData = DesignTemplate::find($design_id);

            if (!Auth::check()) {
                $temporaryUserId = Session::get('temporaryUserId');
                if (!$temporaryUserId) {
                    $temporaryUserId = (string) Str::uuid();
                    Session::put('temporaryUserId', $temporaryUserId);
                }
                $userType = 'Guest';
                
            } else {
                $userType = 'User';
                $userId = Auth::id();
            }
            if( $userType == 'User' ) {
                $basket = Basket::where('accessorie_id',$request->product_id)->where('user_id',$userId)->where('status',false)->first();
            } else {
                $basket = Basket::where('accessorie_id',$request->product_id)->where('temporary_id',$temporaryUserId)->where('status',false)->first();
            }
            
            if(!$basket) {
                $basket = new Basket();
            } 
            $basket->user_id = $userId;
            $basket->temporary_id = $temporaryUserId;
            // $basket->name = $designData->name ?? null; 
            // $basket->width = $designData->width ?? null;
            // $basket->height = $designData->height ?? null;
            // $basket->dimension = $designData->dimension ?? null;
            $basket->accessorie_id = $request->product_id;
            $basket->variations = $request->variations;
            // $basket->size_id = $designData->size_id ?? null;
            $basket->qty = $qty;
            $basket->product_type = $request->product_type;
            $basket->save();
        }
        return response()->json(['id'=> $basket->id ]);

    }

    public function removeItem(Request $request)
    {
        

        $id = $request->item_id;
        $basket_item = Basket::find($id);
        if($basket_item){
            $designData = DesignTemplate::find($basket_item->design_id);
            if($designData){
                if($designData->design_method == 'Artwork'){
                    $imageArray = json_decode($designData->image, true);

                    foreach ($imageArray as $imageIndex => $value) {
                        $imagePath = public_path('designImage/'. $imageIndex) ;
                        if (file_exists($imagePath)) {
                            unlink($imagePath);
                        } 
                    }
                }
                $designData->delete();
            }
            $basket_item->delete();
            if (!Auth::check()) {
                $temporaryUserId = Session::get('temporaryUserId');
                if (!$temporaryUserId) {
                    $temporaryUserId = (string) Str::uuid();
                    Session::put('temporaryUserId', $temporaryUserId);
                }
                $userType = 'Guest';
                $basketItems = Basket::where('temporary_id',$temporaryUserId)->where('status',false)->get();
            } else {
                $userType = 'User';
                $userId = Auth::id();
                $basketItems = Basket::where('user_id',$userId)->where('status',false)->get();
            }
            $total = 0;
            if($basketItems){
                $total = count($basketItems);
            }
            return response()->json(['result'=>true,'total'=>$total]);
        } else {
            return response()->json(false);
        }
    }
}
