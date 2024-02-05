<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAccessories extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'slug',
        'accessories_type',
        'images',
        'description',
        'is_printed',
        'price',
        'additional_info',
        'quantity',
        'status'
    ];
    public function type()
    {
        return $this->hasOne(AccessoriesType::class,'id','accessories_type');
    }

    public function sizes()
    {
        return $this->hasMany(AccessoriesSize::class,'accessories_id','id');
    }

    public function variations(){
        return $this->hasMany(AccessoriesVariations::class,'accessories_id','id');
    }

}
