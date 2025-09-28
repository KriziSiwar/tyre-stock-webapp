<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tyre extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'locker_id',
        'dimension',
        'type',
        'wear',
        'season',
        'qr_code',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function locker()
    {
        return $this->belongsTo(Locker::class);
    }

    public function scopeInStock($query)
    {
        return $query->whereNull('removed_at');
    }
}
