<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
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
        'image',
        'status',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
