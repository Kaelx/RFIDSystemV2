<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'sname',
        'bdate',
        'sex',
        'image',
        'status',
    ];
}
