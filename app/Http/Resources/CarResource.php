<?php

namespace App\Http\Resources;

use App\Helpers\Helper;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $appURL = config('app.url');
        $isSingleItemRequest = $request->routeIs('api.v2.cars.show');
        $data = [
            'id' => $this->id,
            'make_id' => $this->product_group_id,
            'car_model_id' => $this->product_group_id,
            'name' => $this->getTranslatedAttribute('name'),
            'full_name' => $this->full_name,
            'url' => $this->url,
            'img' => $this->image ? $appURL . $this->img : '',
            'small_img' => $this->image ? $appURL . $this->small_img : '',
            'medium_img' => $this->image ? $appURL . $this->medium_img : '',
            'gallery' => [],
            'price' => $this->price,
            'price_formatted' => Helper::formatPrice($this->price),
            'description' => $this->getTranslatedAttribute('description'),
            // 'body' => $this->when($isSingleItemRequest, $this->getTranslatedAttribute('body')),
            // 'seo_title' => $this->when($isSingleItemRequest, $this->seo_title ?: Helper::seo('product', 'seo_title', $seoReplacements)),
            // 'meta_description' => $this->when($isSingleItemRequest, $this->meta_description ?: Helper::seo('product', 'meta_description', $seoReplacements)),
            // 'meta_keywords' => $this->when($isSingleItemRequest, $this->meta_keywords ?: Helper::seo('product', 'meta_keywords', $seoReplacements)),
        ];

        if ($this->image) {
            $data['gallery'][] = [
                'original' => $appURL . $this->img,
                'micro' => $appURL . $this->micro_img,
                'small' => $appURL . $this->small_img,
                'medium' => $appURL . $this->medium_img,
            ];
        }

        foreach ($this->imgs as $key => $value) {
            $data['gallery'][] = [
                'original' => $appURL . $value,
                'micro' => $appURL . $this->micro_imgs[$key],
                'small' => $appURL . $this->small_imgs[$key],
                'medium' => $appURL . $this->medium_imgs[$key],
            ];
        }
        return $data;
    }
}
