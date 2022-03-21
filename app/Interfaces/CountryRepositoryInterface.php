<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface CountryRepositoryInterface
{
    public function countriesWithBusiness() : Collection;
}
