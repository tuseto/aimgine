<?php

namespace App\Models\Work;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'work_projects';
    protected $attributes = ['thumbnail' => '0','link' => 'www'];

    public function images(){
        return $this->hasMany('App\Models\Work\ProjectGallery','project_id','id');
    }

    public function category(){
        return $this->belongsTo('App\Models\Work\Category','id');
    }

}
