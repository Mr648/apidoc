<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MiddlewareResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'previous' => $this->previous,
            'name' => $this->name,
            'next' => $this->next,
            'created_at' => $this->created_at,
        ];
    }
}
