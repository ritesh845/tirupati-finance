<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Client extends Model
{
	use SoftDeletes;
    protected $table = 'clients';
    protected $guarded = [];
    
    public function loans(){
    	return $this->hasMany('App\Models\ClientLoan','client_id');
    }
}
