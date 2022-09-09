<?php

namespace App\Models;

use App\Events\ModelDeleted;
use App\Events\ModelSaved;
use App\Helpers\Helper;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Resizable;

class Car extends Model
{
    use Resizable;
    use Translatable;
    use HasFactory;

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    protected $guarded = [];

    protected $with = ['carModel'];

    public static $imgSizes = [
        'small' => [308, 173],
        'medium' => [365, 205],
    ];

    protected $translatable = ['name', 'slug', 'description', 'body', 'seo_title', 'meta_description', 'meta_keywords'];

    protected $dispatchesEvents = [
        'saved' => ModelSaved::class,
        'deleted' => ModelDeleted::class,
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function (Car $car) {
            $car->mileage = (int)$car->mileage;
            $car->year = (int)$car->year;
            if ($car->year < 1900) {
                $car->year = 1900;
            }
            if ($car->year > 2100) {
                $car->year = 2100;
            }
        });
    }

    public function searches()
    {
        return $this->morphMany(Search::class, 'searchable');
    }

    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }

    public function carModifications()
    {
        return $this->belongsTo(CarModification::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function specifications()
    {
        return $this->belongsToMany(Specification::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    public function getBgAttribute()
    {
        return Voyager::image($this->background);
    }

    public function getImgAttribute()
    {
        return $this->image ? Voyager::image($this->image) : asset('images/no-product-image.jpg');
    }

    public function getfeatureSummaryImgAttribute()
    {
        return $this->feature_summary_image ? Voyager::image($this->feature_summary_image) : asset('images/no-product-image.jpg');
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

    public function getCurrentPriceAttribute()
    {
        $currentPrice = $this->isDiscounted() ? $this->sale_price : $this->price;
        return round(Helper::exchangeRate() * $currentPrice, 2);
    }

    public function getURLAttribute()
    {
        return $this->getURL();
    }

    public function getURL($lang = '')
    {
        if (!$lang) {
            $lang = app()->getLocale();
        }
        $slug = $this->getTranslatedAttribute('slug', $lang) ?: $this->slug;
        // $url = 'cars/' . $this->id . '-' . $slug;
        $url = 'cars/' . $this->id;
        return LaravelLocalization::localizeURL($url, $lang);
    }
    public function isDiscounted()
    {
        return ($this->sale_price > 0 && $this->sale_price < $this->price);
    }

    public function isActive()
    {
        return $this->status == self::STATUS_ACTIVE;
    }

    public function getFullNameAttribute()
    {
        $carModel = $this->carModel;
        $carModel->load('translations');
        return $carModel->full_name . ' (' . $this->year . ')';
    }
}
