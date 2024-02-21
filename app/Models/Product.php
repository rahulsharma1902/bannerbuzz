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
        'is_printed',
        'additional_info',
        'quantity',
        'status'
    ];

    public function sizes(){
        return $this->hasMany(ProductSize::class,'product_id','id');
    }
    public function category(){
        return $this->hasOne(ProductCategories::class,'id','category_id');
    }

    public function productType(){
        return $this->hasOne(ProductType::class,'id','product_type_id');
    }

    public function variations(){
        return $this->hasMany(ProductVariations::class,'product_id','id');
    }
}
