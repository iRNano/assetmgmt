<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetDetail extends Model
{
    public function asset(){
    	return $this->belongsTo(Asset::class);
    }

    public function status(){
    	return $this->belongsTo(AssetStatus::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
