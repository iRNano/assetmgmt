<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function assets(){
        return $this->belongsToMany(AssetDetail::class, 'assets_transactions')->withPivot('quantity')->withTimestamps();
    }

    public function status(){
        return $this->belongsTo(TransactionStatus::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
