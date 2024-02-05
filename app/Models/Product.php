<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'slug',
        'product_type_id',
        'category_id',
        'accessories_type_id',
        'images',
        'description',
        'price',
        'additional_info',
        'quantity',
        'status'
    ];

    public function category(){
        return $this->hasOne(ProductCategories::class,'id','category_id');
    }

    public function variations(){
        return $this->hasMany(ProductVariations::class,'product_id','id');
    }
}
