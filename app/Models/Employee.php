<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'school_id',
        'fname',
        'mname',
        'lname',
        'sname',
        'bdate',
        'sex',
        'department_id',
        'program_id',
        'position_id',
        'image',
        'status',
    ];


    public function department()
    {
        return $this->belongsTo(Category::class, 'department_id');
    }

    public function program()
    {
        return $this->belongsTo(Category::class, 'program_id');
    }
    public function position()
    {
        return $this->belongsTo(Category::class, 'position_id');
    }
}
