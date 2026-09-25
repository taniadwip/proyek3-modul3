<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreActivityRequest extends FormRequest
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
        'title' => ['required', 'string', 'min:5', 'max:100'], // BR-01
        'description' => ['nullable', 'string'],
        'activity_date' => ['required', 'date'],                // BR-02
        'category' => ['required', 'string', 'max:50'],
        'status' => ['required', 'in:Planned,Ongoing,Done'],   // BR-03
    ];
}
}
