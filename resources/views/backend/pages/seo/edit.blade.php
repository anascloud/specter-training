@extends('backend.layouts.app')

@section('content')
    <div class="">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">SEO Management</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Manage Meta tags, Open Graph, and Schema for all routes.
                </p>
            </div>
        </div>

        <div class="mb-4">
            <form action="{{ route('admin.seo.update', $seo) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="space-y-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <x-form.select-input name="path" label="Page Name" :value="$seo->path" :options="$routes" />
                        <x-form.input-text name="meta_title" label="Meta Title" :value="$seo->meta_title"
                            placeholder="Enter meta title..." />
                    </div>

                   <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                     <x-form.textarea-input name="meta_description" label="Meta Description" :value="$seo->meta_description"
                        placeholder="Enter a description..." rows="2" />

                    <x-form.textarea-input name="meta_keywords" label="Meta Keywords" :value="$seo->meta_keywords"
                        placeholder="Enter keywords separated by commas..." rows="2" />
                   </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <x-form.input-text name="robots" label="Robots" :value="$seo->robots"
                            placeholder="Enter robots directive..." />

                        <x-form.input-text name="canonical_url" label="Canonical URL" :value="$seo->canonical_url"
                            placeholder="Enter canonical URL..." />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="og-section space-y-3">
                            <x-form.input-text name="og_title" label="Open Graph Title" :value="$seo->og_title"
                                placeholder="Enter Open Graph title..." />

                            <x-form.input-text name="og_description" label="Open Graph Description" :value="$seo->og_description"
                                placeholder="Enter Open Graph description..." />

                            <div class="">
                                <label for="og_image"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">Open Graph
                                    Image</label>
                                <x-form.dropzone name="og_image" label="Open Graph Image" value=""
                                    placeholder="Upload Open Graph image..." />
                            </div>
                        </div>
                        <div class="twitter-section space-y-3">
                            <x-form.input-text name="twitter_title" label="Twitter Title" :value="$seo->twitter_title"
                                placeholder="Enter Twitter title..." />

                            <x-form.input-text name="twitter_description" label="Twitter Description" :value="$seo->twitter_description"
                                placeholder="Enter Twitter description..." />
                            <div class="">
                                <label for="twitter_image"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">Twitter
                                    Image</label>
                                <x-form.dropzone name="twitter_image" label="Twitter Image" value=""
                                    placeholder="Upload Twitter image..." />
                            </div>
                        </div>
                    </div>
                    <x-form.textarea-input name="schema_markup" label="Schema Markup" :value="$seo->schema_markup" placeholder="Enter schema markup..."
                        rows="4" />
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="mt-6 inline-flex items-center justify-center rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
                        Update SEO Meta
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
