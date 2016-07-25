<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobReviews extends Model
{
    //
    public function Job(){
        return $this->belongsTo('App\Job');
    }
    public function User(){
        return $this->belongsTo('App\User');
    }


}
