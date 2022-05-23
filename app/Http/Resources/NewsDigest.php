<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsDigest extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $lang = $this['lang'];
        if($this['title_' . $lang] == null ||
            empty($this['title_' . $lang])
        )
            $lang = $this['default_lang'];

        return [
            'title' => $this['title_' . $lang],
            'digest' => $this['digest_' . $lang],
            'id' => $this['id'],
            'image' => asset('storage/products/' . $this['pic']),
            'created_at' => explode('T', $this['created_at'])[0],
            'tags' => explode('_', $this['tags_' . $lang])
        ];
    }
}
