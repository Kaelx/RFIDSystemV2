<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
/**
 * Get all of the vendor's RFID scans.
 */
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

    public function rfidScans()
    {
        return $this->morphMany(RfidScan::class, 'recordable');
    }
}
