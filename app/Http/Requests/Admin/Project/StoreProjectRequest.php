<?php

namespace App\Http\Requests\Admin\Project;

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
            'collaborators' => 'exists:collaborators,id',
            'cover_image' => 'nullable|image|max:500',
            'video' => 'nullable|url',
            'start_date' => 'nullable|date',
            'finish_date' => 'nullable|date',
            'description' => 'nullable|max: 500',
            'status' => 'required|integer|max:2|min:0',
            'note_name' => 'nullable',
            'note_content' => 'nullable'
        ];
    }
}
