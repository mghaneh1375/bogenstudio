<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class Model3DResource extends JsonResource
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
            'visibility' => $this->visibility,
            'model' => URL::asset('storage/models/' . $this->model),
            'texture' => ($this->texture == null) ? '' : URL::asset('storage/models/' . $this->texture),
            'priority' => $this->priority
        ];
    }
}
