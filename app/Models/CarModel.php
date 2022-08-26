<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['make'];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function make()
    {
        return $this->belongsTo(Make::class);
    }
}
