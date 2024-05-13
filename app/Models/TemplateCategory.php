<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateCategory extends Model
{
    use HasFactory;
    public function parent(){
        return $this->hasOne(TemplateCategory::class,'id','parent_category');
    }
    // TemplateCategory model

    public function children()
    {
        return $this->hasMany(TemplateCategory::class, 'parent_category', 'id');
    }

}
