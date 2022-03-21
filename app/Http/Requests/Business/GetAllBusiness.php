<?php

namespace App\Http\Requests\Business;

use Illuminate\Foundation\Http\FormRequest;

class GetAllBusiness extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'limit' => 'nullable|integer',
            'offset' => 'nullable|integer'
        ];
    }
}
