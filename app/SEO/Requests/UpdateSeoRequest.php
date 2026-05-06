<?php

namespace App\SEO\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSeoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $seoId = $this->route('seo');

        return [
            'path' => 'required|string' . $seoId,

            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'meta_keywords' => 'nullable|string|max:1000',

            'robots' => 'nullable|string|max:50',

            'canonical_url' => 'nullable|url|max:255',

            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string|max:1000',
            'og_image' => 'nullable|string|max:255',
            'og_type' => 'nullable|string|max:50',

            'twitter_title' => 'nullable|string|max:255',
            'twitter_description' => 'nullable|string|max:1000',
            'twitter_image' => 'nullable|string|max:255',

            'schema_markup' => 'nullable|string',

            'is_active' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'path.required' => 'Please select a page or route.',

            'canonical_url.url' => 'Please enter a valid canonical URL.',

            'is_active.required' => 'Please select SEO status.',
            'is_active.boolean' => 'Invalid status selected.',
        ];
    }
}