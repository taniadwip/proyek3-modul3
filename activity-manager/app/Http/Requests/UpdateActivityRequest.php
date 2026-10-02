<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateActivityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => [
                'required', 
                'string', 
                'max:20', 
                Rule::unique('activities', 'code')->ignore($this->route('activity'))
            ],
            'title' => ['required', 'string', 'max:100'],
            'activity_date' => ['required', 'date'],
            'category_id' => ['required', 'exists:categories,id'],
            'status' => ['required', 'in:Planned,Ongoing,Done'],
            'description' => ['nullable', 'string'],
        ];
    }
}
