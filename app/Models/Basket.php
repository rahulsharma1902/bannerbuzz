<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    public function design(){
        return $this->hasOne(DesignTemplate::class,'id','design_id'); 
    }
}
