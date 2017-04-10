<?php

namespace App\Models\Contactus;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    protected $table = 'contactus_elements';

    public function forms()
    {
        return $this->belongsToMany('App\Models\Contactus\Form','contactus_forms_elements','element_id','form_id');
    }
}
