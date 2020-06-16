<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LoanMast extends Model
{
    use SoftDeletes;
    protected $table = 'loan_mast';
    protected $guarded = [];
    public function instalments(){
    	return $this->hasMany('App\Models\InstalmentMast','loan_mast_id');
    }
}
