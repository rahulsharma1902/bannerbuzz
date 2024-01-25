<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    use HasFactory;
    public function category(){
        return $this->hasOne(BackgroundCategory::class,'id','category_id');
    }
}
