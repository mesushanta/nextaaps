<?php

namespace App\Repositories;

use App\Http\Requests\Business\GetAllBusiness;
use App\Interfaces\BusinessRepositoryInterface;
use App\Models\Business;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;

class BusinessRepository implements BusinessRepositoryInterface
{
    protected Business $business;

    public function __construct(Business $business)
    {
        $this->business = $business;
    }

    public function getAllBusiness(GetAllBusiness $request) : Collection|Paginator
    {
        if(!$request->limit) {
            return Business::all();
        }
        return $this->business->simplePaginate($request->limit, ['*'], 'offset')->withPath(url('/api/business?limit='.$request->limit));
    }

    /**
     * @param $businessId
     * @return mixed
     */
    public function getBusinessById($businessId) : ?Business
    {
        return $this->business->find($businessId);
    }

}
