<?php

namespace App\Models\Wedo;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'wedo_services';

    public function category(){
        return $this->belongsTo('App\Models\Wedo\Category','id');
    }
}
