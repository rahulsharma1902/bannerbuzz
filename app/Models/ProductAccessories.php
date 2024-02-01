<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAccessories extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->hasOne(AccessoriesType::class,'id','accessories_type');
    }

    public function sizes()
    {
        return $this->hasMany(ProductSize::class,'product_id','id');
    }

}
