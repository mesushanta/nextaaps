<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\GetCountryWithBusiness;
use App\Http\Resources\CountryCollection;
use App\Interfaces\CountryRepositoryInterface;

class CountryController extends Controller
{
    private CountryRepositoryInterface $countryRepository;

    public function __construct(CountryRepositoryInterface $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    /**
     * Return the countries with at least one business
     *
     * @param  GetCountryWithBusiness $request
     * @return CountryCollection
     */
    public function countryWithBusiness(GetCountryWithBusiness $request) : CountryCollection {
        return new CountryCollection($this->countryRepository->countriesWithBusiness());
    }
}
