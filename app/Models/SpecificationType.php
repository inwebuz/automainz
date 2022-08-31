<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class SpecificationType extends Model
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

    public function specifationGroup()
    {
        return $this->belongsTo(SpecificationGroup::class);
    }

    public function specifications()
    {
        return $this->hasMany(Specification::class);
    }
}
