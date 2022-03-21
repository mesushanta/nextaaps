<?php

namespace App\Interfaces;

use App\Http\Requests\Search\SearchBusiness;
use Illuminate\Database\Eloquent\Collection;

interface SearchRepositoryInterface
{
    public function search(SearchBusiness $request) : Collection;
}
