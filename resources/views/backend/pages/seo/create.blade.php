@extends('backend.layouts.app')

@section('content')
<div class="">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">SEO Management</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Manage Meta tags, Open Graph, and Schema for all routes.</p>
            </div>            
        </div>

        <div class="mb-4">
           <form action="">
              <div class="">
                <x-form.select-input name="type" label="Page Name" value="Hospitality Management" :options="[
                            'retail-operations' => 'Retail Operations',
                            'advanced-manufacturing' => 'Advanced Manufacturing',
                            'business-administration' => 'Business Administration',
                        ]" />
                <x-form.text-input name="meta_title" label="Meta Title" value="Hospitality Management" />
                <x-form.textarea-input name="meta_description" label="Meta Description" value="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua." />
                <x-form.multi-select-input name="meta_keywords" label="Meta Keywords" :options="[
                            'hospitality' => 'Hospitality',
                            'management' => 'Management',
                            'training' => 'Training',
                            'course' => 'Course',
                        ]" :selected="['hospitality', 'management']" />
                <x-form.text-input name="og_title" label="Open Graph Title" value="Hospitality Management" />
                <x-form.textarea-input name="og_description" label="Open Graph Description" value="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua." />
                <x-form.text-input name="schema" label="Schema Markup (JSON-LD)" value='{
                    "@context": "https://schema.org",
                    "@type": "WebPage",
                    "name": "Hospitality Management",
                    "description": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                    "url": "https://example.com/hospitality-management"
                }' />
                <x-form.submit-button label="Save SEO Settings" />
              </div>
        
        </form>
        </div>
</div>
@endsection