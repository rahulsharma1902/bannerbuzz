<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'product_types';

    use HasFactory;

    protected $fillable =[
        'name',
        'slug',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(ProductCategories::class,'category_id','id');
    }
}
