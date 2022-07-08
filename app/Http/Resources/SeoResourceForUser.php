<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SeoResourceForUser extends JsonResource
{
    
    private static $lang = '';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $lang = (self::$lang == '') ? $this['lang'] : self::$lang;
        
        return [
            'title' => $this['keyword_' . $lang],
            'digest' => $this['article_tag_' . $lang],
            'description' => $this['description_' . $lang],
            'page' => $this['page'],
        ];
    }

    public static function customMake($resource, $lang)
    {
        self::$lang = $lang;
        
        return [
            'keyword' => $resource['keyword_' . $lang],
            'article_tag' => $resource['article_tag_' . $lang],
            'description' => $resource['description_' . $lang],
            'page' => $resource['page']
        ];
    }
}
