<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'sname',
        'bdate',
        'sex',
        'image',
        'rfid',
        'status',
    ];

    public function rfidScans()
    {
        return $this->morphMany(RfidScan::class, 'recordable');
    }
}
