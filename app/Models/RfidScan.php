<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RfidScan extends Model
{
    protected $fillable = [
        'recordable_id',
        'recordable_type',
        'scanned_at',
    ];

    /**
     * Get the parent recordable model (student, employee, vendor).
     */
    public function recordable()
    {
        return $this->morphTo();
    }
}
