<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BusinessCollection;
use App\Http\Requests\Search\SearchBusiness;
use App\Interfaces\SearchRepositoryInterface;

class SearchController extends Controller
{
    private SearchRepositoryInterface $searchRepository;

    public function __construct(SearchRepositoryInterface $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    /**
     * Return the search result based on the query or filter
     *
     * @param  SearchBusiness $request
     * @return BusinessCollection
     */
    public function search(SearchBusiness $request) : BusinessCollection  {
        return new BusinessCollection($this->searchRepository->search($request));
    }



}
