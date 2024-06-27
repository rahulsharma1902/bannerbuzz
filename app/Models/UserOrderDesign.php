<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrderDesign extends Model
{
    use HasFactory;

    public function design()
    {
        return $this->hasOne(DesignTemplate::class,'id','design_id'); 
    }

    public function accessorie()
    {
        return $this->hasOne(ProductAccessories::class,'id','accessorie_id'); 
    }

    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id'); 
    }
}
