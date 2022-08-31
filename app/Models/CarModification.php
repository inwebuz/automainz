<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Resizable;

class CarModification extends Model
{
    use Resizable;
    use Translatable;
    use HasFactory;

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    protected $guarded = [];

    public static $imgSizes = [
        'small' => [160, 160],
    ];

    protected $translatable = ['name', 'slug', 'description', 'body', 'seo_title', 'meta_description', 'meta_keywords'];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'car_modification_feature');
    }

    public function specifications()
    {
        return $this->belongsToMany(Specification::class, 'car_modification_specification');
    }

    public function getBgAttribute()
    {
        return Voyager::image($this->background);
    }

    public function getImgAttribute()
    {
        return $this->image ? Voyager::image($this->image) : asset('images/no-product-image.jpg');
    }

    public function getMicroImgAttribute()
    {
        return $this->image ? Voyager::image($this->getThumbnail($this->image, 'micro')) : asset('images/no-product-image.jpg');
    }

    public function getSmallImgAttribute()
    {
        return $this->image ? Voyager::image($this->getThumbnail($this->image, 'small')) : asset('images/no-product-image.jpg');
    }

    public function getMediumImgAttribute()
    {
        return $this->image ? Voyager::image($this->getThumbnail($this->image, 'medium')) : asset('images/no-product-image.jpg');
    }

    public function getLargeImgAttribute()
    {
        return $this->image ? Voyager::image($this->getThumbnail($this->image, 'large')) : asset('images/no-product-image.jpg');
    }

    public function getMicroImgsAttribute()
    {
        return $this->getImgsGroup($this->images, 'micro');
    }

    public function getSmallImgsAttribute()
    {
        return $this->getImgsGroup($this->images, 'small');
    }

    public function getMediumImgsAttribute()
    {
        return $this->getImgsGroup($this->images, 'medium');
    }

    public function getLargeImgsAttribute()
    {
        return $this->getImgsGroup($this->images, 'large');
    }

    public function getImgsAttribute()
    {
        return $this->getImgsGroup($this->images);
    }

    private function getImgsGroup($images, $type = '')
    {
        $group = [];
        $getImages = json_decode($images);
        if (is_array($getImages)) {
            foreach ($getImages as $value) {
                $group[] = ($type == '') ? Voyager::image($value) : Voyager::image($this->getThumbnail($value, $type));
            }
        }
        return $group;
    }
}
