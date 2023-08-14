<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResourceForUser extends JsonResource
{

    private static $lang = '';

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $lang = (self::$lang == '') ? $this['lang'] : self::$lang;

        return [
            'title' => $this['title_' . $lang],
            'digest' => $this['digest_' . $lang],
            'description' => $this['description_' . $lang],
            'tags' => explode('_', $this['tags_' . $lang]),
            'image' => asset('storage/products/' . $this['pic']),
            'id' => $this['id'],
            'created_at' => explode('T', $this['created_at'])[0],
        ];
    }

    public static function customCollection($resource, $data)
    {
        self::$lang = $data;
        return parent::collection($resource);
    }

    public static function customMake($resource, $data)
    {
        self::$lang = $data;
        return parent::make($resource);
    }
}
