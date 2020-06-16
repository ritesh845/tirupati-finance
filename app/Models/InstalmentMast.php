<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class InstalmentMast extends Model
{
    use SoftDeletes;
    protected $table = 'instalment_mast';
    protected $guarded = [];
}
