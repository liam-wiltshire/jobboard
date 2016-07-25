<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTypes extends Model
{
    //
    public function Users(){
        return $this->hasMany('App\Users');
    }
}
