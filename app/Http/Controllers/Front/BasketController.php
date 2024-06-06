<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\DesignTemplate;
use Auth;
use Session;

class BasketController extends Controller
{
    public function AddToBasket(Request $request)
    {
        $design_id = $request->design_id;
        $qty = $request->qty;
        $designData = DesignTemplate::find($design_id);
        $basket = new Basket();

        if($design_id != null){
            // $template_data = Template::find($request->template_id);
            if (!Auth::check()) {
                $temporaryUserId = Session::get('temporaryUserId');
                if (!$temporaryUserId) {
                    $temporaryUserId = (string) Str::uuid();
                    Session::put('temporaryUserId', $temporaryUserId);
                }
                $userType = 'Guest';
                $basket->temporary_id = $temporaryUserId;
            } else {
                $userType = 'User';
                $userId = Auth::id();
                $basket->user_id = $userId;
            }
            $basket->name = $designData->name ?? ""; 
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

            return response()->json(['id'=> $basket->id ]);
        }

    }

    public function removeItem(Request $request)
    {
        $id = $request->item_id;
        $basket_item = Basket::find($id);
        if($basket_item){
            $basket_item->delete();
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
