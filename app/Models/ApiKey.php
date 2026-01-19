<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ApiKey extends Model
{
    protected $fillable = [
        'user_id',
        'key',
        'name',
        'last_used_at'
    ];

    protected $casts = [
        'last_used_at' => 'datetime',
    ];

    // Relationship: API key belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Generate a unique API key
    public static function generate()
    {
        do {
            $key = 'sk_' . Str::random(60);
        } while (self::where('key', $key)->exists());

        return $key;
    }

    // Update last used timestamp
    public function markAsUsed()
    {
        $this->update(['last_used_at' => now()]);
    }
}
