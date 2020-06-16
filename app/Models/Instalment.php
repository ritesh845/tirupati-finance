<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Instalment extends Model
{
    use SoftDeletes;
    protected $table = 'instalments';
    protected $guarded = [];

    public function client(){
    	return $this->belongsTo('App\Models\Client','client_id');
    }
    public function client_loan(){
    	return $this->belongsTo('App\Models\ClientLoan','loan_id');
    }
}
