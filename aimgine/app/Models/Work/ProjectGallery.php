<?php

namespace App\Models\Work;

use Illuminate\Database\Eloquent\Model;

class ProjectGallery extends Model
{
    protected $table = 'work_projects_gallery';

    public function project(){
        return $this->belongsTo('App\Models\Work\Project','id');
    }
}
