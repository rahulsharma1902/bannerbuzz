<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClipArtCategory extends Model
{
    use HasFactory;
    public function clipart(){
        return $this->hasMany(Clipart::class,'category_id','id');
    }
}
