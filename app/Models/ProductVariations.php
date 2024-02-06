<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariations extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'entity_id',
        'status'
    ];

    public function variationData(){
        return $this->hasMany(ProductVariationsData::class,'product_variation_id','id');
    }
}
