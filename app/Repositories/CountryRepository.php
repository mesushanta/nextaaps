<?php

namespace App\Repositories;

use App\Interfaces\CountryRepositoryInterface;
use App\Models\Country;
use Illuminate\Database\Eloquent\Collection;

class CountryRepository implements CountryRepositoryInterface
{
    protected Country $country;

    public function __construct(Country $country)
    {
        $this->country = $country;
    }

    public function countriesWithBusiness() : Collection
    {
        return $this->country::has('businesses')->get();
    }
}
