<?php

namespace App\Http\Requests\Admin\Project;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'name' => 'required',
            'url' => 'required|url',
            'demo_project' => 'nullable|url',
            'technologies' => 'exists:technologies,id',
            'collaborators' => 'exists:collaborators,id',
            'cover_image' => 'nullable|image|max:500',
            'video' => 'nullable|url',
            'status' => 'required',
            'start_date' => 'required',
            'finish_date' => 'nullable',
            'description' => 'nullable',
            'notes' => 'nullable',
        ];
    }
}
