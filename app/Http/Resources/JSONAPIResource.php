<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JSONAPIResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => (string)$this->id,
            'type' => $this->type(),
            'attributes' => $this->allowedAttributes(),
];
    }
}
