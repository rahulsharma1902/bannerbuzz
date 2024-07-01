<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function payment(){
        return $this->hasOne(Payment::class,'order_id','id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function BillingAddress(){
        return $this->hasOne(UserMeta::class,'id','billing_address_id');
    }

    public function ShipingAddress(){
        return $this->hasOne(UserBilling::class,'id','shipping_address_id');
    }
}
