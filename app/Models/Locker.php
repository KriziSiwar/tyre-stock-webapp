<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'location',
        'description',
    ];

    public function tyres()
    {
        return $this->hasMany(Tyre::class);
    }
}
