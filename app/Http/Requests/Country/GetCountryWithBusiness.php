<?php

namespace App\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;

class GetCountryWithBusiness extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

        ];
    }
}
