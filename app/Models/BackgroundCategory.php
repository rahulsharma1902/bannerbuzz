<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackgroundCategory extends Model
{
    use HasFactory;
    public function background(){
        return $this->hasMany(Background::class,'category_id','id');
    }
}
