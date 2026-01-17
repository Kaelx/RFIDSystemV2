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
        'program_id',
        'image',
        'rfid',
        'status',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    /**
     * Get all of the student's RFID scans.
     */
    public function rfidScans()
    {
        return $this->morphMany(RfidScan::class, 'recordable');
    }
}
