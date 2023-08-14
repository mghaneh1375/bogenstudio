<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SeoDigest extends JsonResource
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
            'id' => $this->id,
            'seo_id' => $this->id,
            'page' => $this->page,
            'article_tag' => $this->article_tag_en == null ? '' : $this->article_tag_en,
            'keyword' => $this->keyword_en == null ? '' : $this->keyword_en,
            'description' => $this->description_en == null ? '' : $this->description_en,
            'updated_at' => explode('T', $this->updated_at)[0]
        ];
    }
}
