<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;

    protected $fillable = [
        'size_type',
        'size_value',
        'size_unit',
        'price',
        'quantity',
        'status'
    ];
}
