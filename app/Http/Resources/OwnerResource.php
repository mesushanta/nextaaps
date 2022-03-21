<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OwnerResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => (string) $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
        ];
    }
}
