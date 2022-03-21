<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BusinessCollection extends ResourceCollection
{

    public function toArray($request): array
    {
        return [
            'businesses' => $this->collection,
            'businessesCount' => $this->count()
        ];
    }
}
