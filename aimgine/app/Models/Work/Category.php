<?php

namespace App\Models\Work;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'work_categories';

    public function projects(){
        return $this->hasMany('App\Models\Work\Project','category_id','id');
    }
}
