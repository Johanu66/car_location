<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ['mark', 'description', 'plate_number', 'price_per_day'];

    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
