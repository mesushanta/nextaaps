<?php

namespace App\Interfaces;

use App\Http\Requests\Business\GetAllBusiness;
use App\Models\Business;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;

interface BusinessRepositoryInterface
{
    public function getAllBusiness(GetAllBusiness $request)  : Collection|Paginator;
    public function getBusinessById($businessId) : ?Business;
}
