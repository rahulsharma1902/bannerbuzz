<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    public function blogs(){
        return $this->hasMany(Blogs::class,'blog_category_id','id');
    }
}
