<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\BusinessController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::fallback(function () {
    return response()->json(['error' => 'Not Found!'], 404);
});


Route::post('login', [LoginController::class,'login']);
Route::get('countries-with-business',[CountryController::class,'countryWithBusiness']);

Route::get('business', [BusinessController::class, 'getAllBusiness']);
Route::get('business/{businessId}', [BusinessController::class, 'getBusinessById']);

Route::get('search', [SearchController::class,'search']);


Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum']], function() {

    Route::get('countries-with-business',[CountryController::class,'countryWithBusiness']);

    Route::get('business', [BusinessController::class, 'getAllBusiness']);
    Route::get('business/{businessId}', [BusinessController::class, 'getBusinessById']);

    Route::get('search', [SearchController::class,'search']);

});
