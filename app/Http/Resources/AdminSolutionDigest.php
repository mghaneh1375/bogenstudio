<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminSolutionDigest extends JsonResource
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
            'title' => $this->title_en,
            'visibility' => $this->visibility,
            'priority' => $this->priority,
            'image' => asset('storage/solutions/' . $this->pic),
            'default_lang' => $this->default_lang,
            'created_at' => explode('T', $this->created_at)[0],
            'updated_at' => explode('T', $this->updated_at)[0],
            'id' => $this->id
        ];
    }
}
