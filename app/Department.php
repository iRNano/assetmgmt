<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    function profile(){
        return $this->hasOne(Profile::class);
    }

    function users(){
        return $this->hasMany(User::class);
    }
}
