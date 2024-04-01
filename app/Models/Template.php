<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    public function category(){
        return $this->hasOne(TemplateCategory::class,'id','category_id');
    }
}
