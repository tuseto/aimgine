<?php

namespace App\Models\Wedo;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'wedo_categories';

    public function services(){
        return $this->hasMany('App\Models\Wedo\Service','category_id','id');
    }
}
