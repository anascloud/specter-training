<?php

namespace App\Http\Requests\Admin\Cms;

use Illuminate\Foundation\Http\FormRequest;

class SectionStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:50'],
            'css_classes' => ['nullable', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
            'content_json' => ['nullable', 'string'],
        ];
    }
}
