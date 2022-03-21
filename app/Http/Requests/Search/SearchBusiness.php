<?php

namespace App\Http\Requests\Search;

use Illuminate\Foundation\Http\FormRequest;

class SearchBusiness extends FormRequest
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
            'term' => 'nullable|required_without:country|string',
            'country' => 'nullable|required_without:term|string'
        ];
    }
}
