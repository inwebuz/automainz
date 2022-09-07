<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Resizable;

class Feature extends Model
{
    use Resizable;
    use Translatable;
    use HasFactory;

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    const SOURCE_ADDITIONAL = 0;
    const SOURCE_MAIN = 1;

    protected $guarded = [];

    public static $imgSizes = [
        'micro' => [30, 30],
    ];

    protected $translatable = ['name', 'slug', 'description', 'body', 'seo_title', 'meta_description', 'meta_keywords'];

    public function featureGroup()
    {
        return $this->belongsTo(FeatureGroup::class);
    }

    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }

    public function carModels()
    {
        return $this->belongsToMany(CarModel::class, 'car_model_feature');
    }

    public function carModifications()
    {
        return $this->belongsToMany(CarModification::class, 'car_modification_feature');
    }

    public function scopeActive($query)
    {
        return $query->where('status', static::STATUS_ACTIVE);
    }

    public function scopeMain($query)
    {
        return $query->where('source', static::SOURCE_MAIN);
    }

    public function scopeAdditional($query)
    {
        return $query->where('source', static::SOURCE_ADDITIONAL);
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
