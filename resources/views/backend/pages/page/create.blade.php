@extends('backend.layouts.app')

@section('content')
    <div class="">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Page Management</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Create a new page.</p>
            </div>
            <a href="{{ route('admin.pages.index') }}"
                class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                Back
            </a>
        </div>

        <div class="mb-4">
            <form action="{{ route('admin.pages.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <x-form.input-text name="title" label="Title" value="" placeholder="Enter title..." />
                        <x-form.input-text name="slug" label="Slug" value="" placeholder="e.g. about-us" />
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-4 py-2 bg-brand-600 text-white rounded-lg text-sm font-medium hover:bg-brand-700 transition-colors">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
