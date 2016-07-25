<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaimedJobs extends Model
{
    //
    public function ClaimedJobState(){
        return $this->belongsTo('App\ClaimedJobsStates','claimed_jobs_state_id');
    }



    public function Job(){
        return $this->belongsTo('App\Job');
    }

    public function User(){
        return $this->belongsTo('App\User');
    }
}
