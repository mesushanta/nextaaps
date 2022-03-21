<?php

namespace App\Repositories;

use App\Http\Requests\Search\SearchBusiness;
use App\Interfaces\SearchRepositoryInterface;
use App\Models\Business;
use App\Services\SearchService;
use Illuminate\Database\Eloquent\Collection;

class SearchRepository implements SearchRepositoryInterface
{
    protected Business $business;
    protected SearchService $searchService;

    public function __construct(Business $business, SearchService $searchService)
    {
        $this->business = $business;
        $this->searchService = $searchService;
    }

    public function search(SearchBusiness $request) : Collection {

        # set default search term to search everything
        $term = '*';

        if($request->term) $term = $request->term;

        if(!$request->country) return Business::search($term)->get();

        return Business::search($term, function ($search, $term, $options) use ($request) {
            $search->updateFilterableAttributes(['country']);
            $filter = $this->searchService->makeCountryFilters($request);
            return $search->search($term, ['filter' => [$filter]]);
        })->get();

    }

}
