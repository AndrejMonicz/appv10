<?php

namespace App\Http\Requests\Vehicle;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
           'vehicle_type_id' => '',
           'company_owner_id' => '',
           'license_plate' => 'required|string',
           'board_number' => 'required|string',
           'brand_vehicle_id' => '',
           'description' => 'required|string',

        ];
    }
}
