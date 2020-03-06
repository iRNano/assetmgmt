<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    public function transactions(){
    	return $this->hasMany("App\Transaction", 'type_id');
    }
}
