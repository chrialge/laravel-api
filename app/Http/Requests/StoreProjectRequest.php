<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type_id' => 'nullable|exists:types,id',
            'name' => 'required| min: 5|max:150',
            'url' => 'nullable|url',
            'technologies' => 'exists:technologies,id',
            'cover_image' => 'nullable|image|max:500',
            'video' => 'nullable',
            'start_date' => 'nullable|date',
            'finish_date' => 'nullable|date',
            'description' => 'nullable|max: 500',
            'notes' => 'nullable|max: 200',
            'status' => 'required|integer|max:2|min:0'
        ];
    }
}
