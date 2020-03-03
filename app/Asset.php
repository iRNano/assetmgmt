<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function details(){
    	return $this->hasMany(AssetDetail::class);
    }

    
}
