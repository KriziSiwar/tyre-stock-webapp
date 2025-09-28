<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'tyre_id',
        'action',
        'user_id',
        'date',
        'notes',
    ];

    public function tyre()
    {
        return $this->belongsTo(\App\Models\Tyre::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
