<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
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
            'preview' => asset('storage/videos/' . $this->preview),
            'iframe' => $this->link !== null,
            'file' => $this->link !== null ? $this->link : asset('storage/videos/' . $this->file),
            'title_en' => $this->title_en,
            'description_en' => $this->description_en,
            'title_fa' => $this->title_fa,
            'description_fa' => $this->description_fa,
            'title_gr' => $this->title_gr,
            'description_gr' => $this->description_gr,
            'title_ar' => $this->title_ar,
            'description_ar' => $this->description_ar,
            'id' => $this->id,
            'created_at' => explode('T', $this->created_at)[0],
            'updated_at' => explode('T', $this->updated_at)[0],
            'visibility' => $this->visibility,
            'priority' => $this->priority,
        ];
    }
}
