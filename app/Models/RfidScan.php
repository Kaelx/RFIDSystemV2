<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RfidScan extends Model
{
    protected $fillable = [
        'record_id',
        'rfid',
        'scanned_at',

    ];
    /**
     * Get the student that owns the RFID scan.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
