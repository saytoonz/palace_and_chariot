<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SecurityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $parent = parent::toArray($request);
        // $parent["client_type"] = $this->clientType->client_type;
        return[
            'id' => $this->id,
            'title' => $this->title,
            'image' =>env('APP_URL').$this->image,
            'html_description' => $this->html_description,
            'status' => $this->status,
        ];
    }
}
