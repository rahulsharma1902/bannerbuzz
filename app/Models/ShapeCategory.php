<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShapeCategory extends Model
{
    use HasFactory;
    public function shape(){
        return $this->hasMany(Shape::class,'category_id','id');
    }
}
