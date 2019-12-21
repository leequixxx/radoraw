<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Voyager;

class RawResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge(
            parent::toArray($request),
            [
                'picture' => Voyager::image($this->thumbnail('cropped', 'picture')),
            ]
        );
    }
}
