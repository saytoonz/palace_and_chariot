<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'image' =>env('APP_URL').$this->image,
            'object_id' => $this->object_id,
            'object_type' => $this->object_type,
            'status' => $this->status,
        ];
    }
}