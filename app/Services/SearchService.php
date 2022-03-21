<?php

namespace App\Services;

use App\Http\Requests\Search\SearchBusiness;
use Illuminate\Support\Str;

class SearchService
{

    public function makeCountryFilters(SearchBusiness $request) : array {
            $country_filter = [];
            $countries = Str::of($request->country)->explode(',');
            foreach ($countries as $country) {
                $country_filter[] = "country=".$country;
            }
            return $country_filter;
    }
}
