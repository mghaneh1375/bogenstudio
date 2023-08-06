<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class SolutionDigestUser extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $lang = $this->lang;
        switch ($lang) {
            case "fa":
                $title = $this->title_fa;
                $desc = $this->description_fa;
                break;
            case "en":
                $title = $this->title_en;
                $desc = $this->description_en;
                break;
            case "ar":
                $title = $this->title_ar;
                $desc = $this->description_ar;
                break;
            case "gr":
                $title = $this->title_gr;
                $desc = $this->description_gr;
                break;
        }

        return [
            'title' => $title,
            'description' => $desc,
            'id' => $this->id,
            'created_at' => explode('T', $this->created_at)[0],
            'updated_at' => explode('T', $this->updated_at)[0],
            'image' => asset('storage/solutions/' . $this->pic)
        ];

    }
}
