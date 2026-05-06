@extends('backend.layouts.app')

@section('content')

<div class="">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">SEO Management</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Manage Meta tags, Open Graph, and Schema for all routes.</p>
            </div>
            <a href="{{ route('admin.seo.create') }}" class="px-4 py-2 bg-brand-600 text-white rounded-lg text-sm font-medium hover:bg-brand-700 transition-colors">
                + Add New SEO
            </a>
        </div>
@include('backend.pages.seo.table', ['items' => $items])
</div>

@endsection