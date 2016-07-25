<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    //
    public function JobState(){
        return $this->belongsTo('App\JobsStates','jobs_state_id');
    }
    public function User(){
        return $this->belongsTo('App\User');
    }

    public function ClaimedJob(){
        return $this->hasOne('App\ClaimedJobs','job_id');
    }

    public function Reviews(){
        return $this->hasMany('App\JobReviews','job_id');
    }
}
