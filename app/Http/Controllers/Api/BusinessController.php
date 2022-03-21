<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\BusinessRepositoryInterface;
use App\Http\Resources\BusinessCollection;
use App\Http\Resources\BusinessResource;
use App\Http\Requests\Business\GetAllBusiness;
use App\Http\Requests\Business\GetBusinessById;
use App\Models\Business;
use Illuminate\Http\JsonResponse;

class BusinessController extends Controller
{

    private BusinessRepositoryInterface $businessRepository;

    public function __construct(BusinessRepositoryInterface $businessRepository)
    {
        $this->businessRepository = $businessRepository;
    }

    /**
     * Returns all the business
     * Return Paginated results if limit is provided as query parameter
     *
     * @param  GetAllBusiness $request
     * @return BusinessCollection
     */
    public function getAllBusiness(GetAllBusiness $request) : BusinessCollection {
        return new BusinessCollection($this->businessRepository->getAllBusiness($request));
    }

    /**
     * Returns the specific Business
     *
     * @param  GetBusinessById $request
     * @param  $businessId
     * @return BusinessResource|JsonResponse
     */
    public function getBusinessById(GetBusinessById $request, $businessId) : BusinessResource|JsonResponse {
        $business = $this->businessRepository->getBusinessById($businessId);
        if($business) {
            return new BusinessResource($business);
        }
        return response()->json([],404);
    }


}
