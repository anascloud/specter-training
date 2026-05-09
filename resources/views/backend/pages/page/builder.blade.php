@extends('backend.layouts.app')

@section('content')
    <div class="">
        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 12000000)" x-show="show" x-transition
                class="fixed top-3 right-5 z-[99999] w-full max-w-sm">
                <div class="relative">
                    <button @click="show = false" class="absolute top-3 right-3 z-10 text-gray-500 hover:text-gray-700">
                        ✕
                    </button>

                    <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
                </div>
            </div>
        @endif

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Page Builder</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ $page->title }} <span class="font-mono">({{ $page->slug }})</span>
                </p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('admin.pages.edit', $page) }}"
                    class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                    Edit Page
                </a>
                <a href="{{ route('admin.pages.index') }}"
                    class="px-4 py-2 bg-brand-600 text-white rounded-lg text-sm font-medium hover:bg-brand-700 transition-colors">
                    Back
                </a>
            </div>
        </div>

        <div x-data="{ showAddSection: {{ $page->sections->count() ? 'false' : 'true' }} }" class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="flex items-center justify-between px-5 py-4 border-b border-gray-200 dark:border-gray-800">
                    <div class="text-sm font-semibold text-gray-800 dark:text-white/90">Sections</div>
                    <button type="button" @click="showAddSection = true"
                        class="px-4 py-2 bg-brand-600 text-white rounded-lg text-sm font-medium hover:bg-brand-700 transition-colors">
                        + Add Section
                    </button>
                </div>

                <div class="p-5" x-show="showAddSection" x-transition>
                    <form action="{{ route('admin.pages.sections.store', $page) }}" method="POST" class="space-y-5">
                        @csrf
                      <div class="">
                        <x-form.select-input name="type" label="Section Type" value="" placeholder="Section Type" :options="['Hero', 'Feature', 'About', 'Services', 'Contact']" required required />
                      </div>
                    </form>
                </div>

               
            </div>
        </div>
    </div>
@endsection
