@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-white/90">
                    {{ $title ?? 'Edit Page' }}
                </h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    /{{ $page->slug }}
                </p>
            </div>
            <div class="flex items-center gap-2">
                <a
                    href="{{ route('admin.cms.pages.sections.index', $page) }}"
                    class="rounded-lg border border-gray-200 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-white/5"
                >
                    Manage Sections
                </a>
                <a
                    href="{{ route('admin.cms.pages.index') }}"
                    class="rounded-lg border border-gray-200 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-white/5"
                >
                    Back
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="rounded-lg border border-success-200 bg-success-50 px-4 py-3 text-sm text-success-700 dark:border-success-800/50 dark:bg-success-900/20 dark:text-success-200">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="rounded-lg border border-error-200 bg-error-50 px-4 py-3 text-sm text-error-700 dark:border-error-800/50 dark:bg-error-900/20 dark:text-error-200">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="grid gap-6 lg:grid-cols-3">
            <div class="lg:col-span-2 rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">
                <form method="POST" action="{{ route('admin.cms.pages.update', $page) }}" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Title</label>
                        <input
                            type="text"
                            name="title"
                            value="{{ old('title', $page->title) }}"
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                        />
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Slug</label>
                        <input
                            type="text"
                            name="slug"
                            value="{{ old('slug', $page->slug) }}"
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                        />
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Meta Title</label>
                        <input
                            type="text"
                            name="meta_title"
                            value="{{ old('meta_title', $page->meta_title) }}"
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                        />
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Meta Description</label>
                        <textarea
                            name="meta_description"
                            rows="4"
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                        >{{ old('meta_description', $page->meta_description) }}</textarea>
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Status</label>
                        <select
                            name="status"
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
                        >
                            @foreach ($statuses as $status)
                                <option value="{{ $status }}" @selected(old('status', $page->status) === $status)>{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center gap-3">
                        <button
                            type="submit"
                            class="inline-flex items-center justify-center rounded-lg bg-brand-500 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600"
                        >
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>

            <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white/90">SEO</h2>
                <div class="mt-3">
                    <div class="text-3xl font-semibold text-gray-800 dark:text-white/90">
                        {{ $page->seo_score }}/100
                    </div>
                </div>
                <div class="mt-4 space-y-3 text-sm text-gray-600 dark:text-gray-300">
                    @foreach (($page->seo_report ?? []) as $key => $check)
                        <div class="flex items-start justify-between gap-3">
                            <div class="font-medium text-gray-700 dark:text-gray-300">
                                {{ str_replace('_', ' ', ucfirst($key)) }}
                            </div>
                            <div class="text-right">
                                <span class="inline-flex rounded-full px-2 py-1 text-xs font-semibold {{ !empty($check['ok']) ? 'bg-success-50 text-success-700 dark:bg-success-900/20 dark:text-success-200' : 'bg-gray-100 text-gray-700 dark:bg-white/5 dark:text-gray-300' }}">
                                    {{ !empty($check['ok']) ? 'OK' : 'Needs work' }}
                                </span>
                                @if (array_key_exists('value', $check))
                                    <div class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ $check['value'] }}</div>
                                @endif
                                @if (array_key_exists('keyword', $check))
                                    <div class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ $check['keyword'] }} ({{ $check['occurrences'] ?? 0 }})</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

