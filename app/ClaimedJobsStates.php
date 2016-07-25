<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaimedJobsStates extends Model
{
    //
    public function ClaimedJobs(){
        return $this->hasMany('App\ClaimedJobs','claimed_jobs_state_id');
    }

}
