<?php

namespace App\Models\Ourclients;

use Illuminate\Database\Eloquent\Model;

class Ourclient extends Model
{
    public function projects(){
        return $this->belongsToMany('App\Models\Work\Project','ourclient_projects','ourclient_id','project_id');
    }
}
