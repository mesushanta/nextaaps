<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CountryCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'countries' => $this->collection,
            'countryCount' => $this->count()
        ];
    }
}
