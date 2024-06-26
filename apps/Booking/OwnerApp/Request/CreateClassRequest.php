<?php

namespace App\Http\Requests;

namespace Gym\Apps\Booking\OwnerApp\Request;

use Illuminate\Foundation\Http\FormRequest;

class CreateClassRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string'
            ],
            'start_date' => [
                'required',
                'date',
            ],
            'end_date' => [
                'required',
                'date',
            ],
            'capacity' => [
                'required',
                'integer',
            ],
        ];
    }
}
