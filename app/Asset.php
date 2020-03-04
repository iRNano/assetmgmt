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

    public function asssetTransaction(){
    	return $this->hasManyThrough(AssetDetail::class, Transaction::class);
    }

    public function transactions(){
        return $this->belongsToMany(Transaction::class, 'assets_transactions')->withPivot('quantity')->withTimestamps();
    }
    
}
