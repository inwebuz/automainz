<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $appURL = config('app.url');
        return [
            'id' => $this->id,
            // 'region_id' => $this->region_id,
            'name' => $this->name,
            'img' => $this->image ? $appURL . $this->img : '',
            'small_img' => $this->image ? $appURL . $this->small_img : '',
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'landmark' => $this->landmark,
            'work_hours' => $this->work_hours,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'map_code' => $this->map_code,
        ];
    }
}
