<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];
    //status : 0 => progress, 1 => Fail, 2 => Successful
}
