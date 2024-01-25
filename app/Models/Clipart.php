<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clipart extends Model
{
    use HasFactory;
    public function category(){
        return $this->hasOne(ClipArtCategory::class,'id','category_id');
    }
}
