<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetStatus extends Model
{
    public function details(){
    	return $this->hasMany(AssetDetail::class);
    }
}
