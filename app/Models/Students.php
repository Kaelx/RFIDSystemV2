<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = [
        'school_id',
        'fname',
        'mname',
        'lname',
        'sname',
        'bdate',
        'sex',
        'image'
    ];
}
