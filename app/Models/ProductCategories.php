<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    protected $table = 'product_categories';
    
    use HasFactory;

    protected $fillable =[
        'name',
        'slug',
        'parent_category',
        'images',
        'description',
        'display_on',
        'status'
    ];
    public function parent(){
        return $this->hasOne(ProductCategories::class,'id','parent_category');
    }

    public function subCategories(){
        return $this->hasMany(ProductCategories::class,'parent_category','id');
    }

    public function productTypes(){
        return $this->hasMany(ProductType::class,'category_id','id');
    }

    public function products(){
        return $this->hasMany(Product::class,'category_id','id');
    }
}
