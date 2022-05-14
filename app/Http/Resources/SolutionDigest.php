<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class SolutionDigest extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $items = [];
        $org_lang = $this['lang'];

        foreach ($this['items'] as $item) {

            $lang = $org_lang;
            if($item['title_' . $lang] == null ||
                empty($product['title_' . $lang])
            )
                $lang = $item['default_lang'];

            array_push($items, [
                'title' => $item['title_' . $lang],
                'digest' => $item['digest_' . $lang],
                'image' => asset('storage/solutions/' . $item['pic']),
            ]);
        }

        return [
            'tag' => $this['tag'],
            'items' => $items
        ];
    }
}
