<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Payment extends Model
{
	 use SoftDeletes;
    protected $guarded = [];

    public function instalment(){
    	return $this->belongsTo('App\Models\Instalment','instalment_id');
    }
    //status : 0 => progress, 1 => Fail, 2 => Successful
}
