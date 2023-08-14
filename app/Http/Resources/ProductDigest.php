<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class ProductDigest extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $products = [];
        $org_lang = $this['lang'];

        foreach ($this['products'] as $product) {

            $lang = $org_lang;
            if($product['title_' . $lang] == null ||
                empty($product['title_' . $lang])
            )
                $lang = $product['default_lang'];

            array_push($products, [
                'title' => $product['title_' . $lang],
                'digest' => $product['digest_' . $lang],
                'pic' => URL::asset('storage/products/' . $product['pic']),
            ]);
        }

        return [
            'tag' => $this['tag'],
            'products' => $products
        ];
    }
}
