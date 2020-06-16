<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ClientLoan extends Model
{
    use SoftDeletes;
    protected $table = 'client_loans';
    protected $guarded = [];

    public function instalments(){
    	return $this->hasMany('App\Models\Instalment','loan_id');
    }
    public function loan_mast(){
    	return $this->belongsTo('App\Models\LoanMast','loan_mast_id');
    }
}
