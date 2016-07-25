<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    //
    public function User(){
        return $this->belongsTo('App\User');
    }

    public function Job(){
        return $this->belongsTo('App\Job');
    }
}
