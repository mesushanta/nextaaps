<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{

    public function toArray($request) : array
    {
        return [
            'id' => (string) $this->id,
            'street' => $this->street,
            'house_number' => $this->house_number,
            'unit' => $this->unit,
            'city' => $this->city,
            'postcode' => $this->postcode,
            'country' => new CountryResource($this->country),
        ];
    }
}
