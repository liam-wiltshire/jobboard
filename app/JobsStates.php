<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobsStates extends Model
{
    //
    public function Jobs(){
        return $this->hasMany('App\Jobs','jobs_state_id');
    }
}
