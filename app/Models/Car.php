<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['carModel'];

    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }
}
