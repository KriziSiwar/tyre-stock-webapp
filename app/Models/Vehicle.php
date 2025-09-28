<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'chassis_number',
        'marque',
        'modele',
        'year',
        'color',
        'owner_name',
        'owner_phone',
    ];

    public function tyres()
    {
        return $this->hasMany(Tyre::class);
    }
}
