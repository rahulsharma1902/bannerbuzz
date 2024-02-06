<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariationsData extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'price',
        'quantity',
        'image',
        'description',
        'status'
    ];
}
