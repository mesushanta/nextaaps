<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BusinessResource extends JsonResource
{

    public function toArray($request) : array
    {
        return [
            'id' => (string) $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'address' => AddressResource::collection($this->addresses),
            'owners' => OwnerResource::collection($this->owners),
        ];
    }
}
