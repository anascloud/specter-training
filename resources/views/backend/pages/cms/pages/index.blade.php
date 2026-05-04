@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-white/90">
                {{ $title ?? 'Pages' }}
            </h1>
            <a
                href="{{ route('admin.cms.pages.create') }}"
                class="inline-flex items-center justify-center rounded-lg bg-brand-500 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600"
            >
                Create Page
            </a>
        </div>

        @if (session('success'))
            <div class="rounded-lg border border-success-200 bg-success-50 px-4 py-3 text-sm text-success-700 dark:border-success-800/50 dark:bg-success-900/20 dark:text-success-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="max-w-full overflow-x-auto">
                <table class="min-w-full">
                    <thead class="border-b border-gray-100 dark:border-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Slug</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">SEO</th>
                            <th class="px-6 py-3 text-right text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                        @forelse ($pages as $page)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-white/90">
                                    {{ $page->title }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                                    /{{ $page->slug }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="inline-flex rounded-full px-2 py-1 text-xs font-semibold {{ $page->status === 'published' ? 'bg-success-50 text-success-700 dark:bg-success-900/20 dark:text-success-200' : 'bg-gray-100 text-gray-700 dark:bg-white/5 dark:text-gray-300' }}">
                                        {{ ucfirst($page->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                                    {{ $page->seo_score }}/100
                                </td>
                                <td class="px-6 py-4 text-right text-sm">
                                    <div class="inline-flex items-center gap-2">
                                        <a
                                            href="{{ route('admin.cms.pages.edit', $page) }}"
                                            class="rounded-lg border border-gray-200 px-3 py-1.5 text-sm text-gray-700 hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-white/5"
                                        >
                                            Edit
                                        </a>
                                        <a
                                            href="{{ route('admin.cms.pages.sections.index', $page) }}"
                                            class="rounded-lg border border-gray-200 px-3 py-1.5 text-sm text-gray-700 hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-white/5"
                                        >
                                            Sections
                                        </a>
                                        <form method="POST" action="{{ route('admin.cms.pages.destroy', $page) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="rounded-lg border border-error-200 px-3 py-1.5 text-sm text-error-700 hover:bg-error-50 dark:border-error-800/50 dark:text-error-200 dark:hover:bg-error-900/20"
                                            >
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-sm text-gray-500 dark:text-gray-400">
                                    No pages found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            {{ $pages->links() }}
        </div>
    </div>
@endsection

