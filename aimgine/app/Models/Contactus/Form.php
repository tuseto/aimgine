<?php

namespace App\Models\Contactus;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'contactus_forms';

    public function elements()
    {
        return $this->belongsToMany('App\Models\Contactus\Element','contactus_forms_elements','form_id','element_id');
    }
}
