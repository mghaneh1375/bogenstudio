<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title_en' => $this->title_en,
            'description_en' => $this->description_en,
            'digest_en' => $this->digest_en,
            'tags_en' => $this->tags_en,
            'title_fa' => $this->title_fa,
            'description_fa' => $this->description_fa,
            'digest_fa' => $this->digest_fa,
            'tags_fa' => $this->tags_fa,
            'title_ar' => $this->title_ar,
            'description_ar' => $this->description_ar,
            'digest_ar' => $this->digest_ar,
            'tags_ar' => $this->tags_ar,
            'title_gr' => $this->title_gr,
            'description_gr' => $this->description_gr,
            'digest_gr' => $this->digest_gr,
            'tags_gr' => $this->tags_gr,
            'priority' => $this->priority,
            'default_lang' => $this->default_lang,
            'visibility' => $this->visibility,
            'pic' => asset('storage/products/' . $this->pic)
        ];
    }
}
