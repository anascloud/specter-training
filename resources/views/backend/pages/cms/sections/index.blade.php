@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-white/90">
                    Sections
                </h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Page: {{ $page->title }}
                </p>
            </div>
            <div class="flex items-center gap-2">
                <a
                    href="{{ route('admin.cms.pages.sections.create', $page) }}"
                    class="inline-flex items-center justify-center rounded-lg bg-brand-500 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600"
                >
                    Add Section
                </a>
                <a
                    href="{{ route('admin.cms.pages.edit', $page) }}"
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

        <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                    Section Order
                </h2>
                <button
                    type="button"
                    data-save-order
                    class="rounded-lg border border-gray-200 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-white/5"
                >
                    Save Order
                </button>
            </div>

            <div class="mt-4 overflow-hidden rounded-xl border border-gray-100 dark:border-gray-800">
                <ul id="section-list" class="divide-y divide-gray-100 dark:divide-gray-800">
                    @forelse ($page->sections as $section)
                        <li class="flex items-center gap-3 px-4 py-3" data-section-row data-section-id="{{ $section->id }}">
                                <div class="flex-1">
                                    <div class="text-sm font-semibold text-gray-800 dark:text-white/90">
                                        {{ $section->name }}
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ $section->type }} @if($section->css_classes) • {{ $section->css_classes }} @endif
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button type="button" data-move-up class="rounded-lg border border-gray-200 px-3 py-1.5 text-sm text-gray-700 hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-white/5">
                                        Up
                                    </button>
                                    <button type="button" data-move-down class="rounded-lg border border-gray-200 px-3 py-1.5 text-sm text-gray-700 hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-white/5">
                                        Down
                                    </button>
                                    <a href="{{ route('admin.cms.pages.sections.edit', [$page, $section]) }}" class="rounded-lg border border-gray-200 px-3 py-1.5 text-sm text-gray-700 hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-white/5">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.cms.pages.sections.destroy', [$page, $section]) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-lg border border-error-200 px-3 py-1.5 text-sm text-error-700 hover:bg-error-50 dark:border-error-800/50 dark:text-error-200 dark:hover:bg-error-900/20">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                        </li>
                    @empty
                        <li class="px-4 py-10 text-center text-sm text-gray-500 dark:text-gray-400">
                            No sections yet.
                        </li>
                    @endforelse
                </ul>
            </div>

            <form id="reorder-form" method="POST" action="{{ route('admin.cms.pages.sections.reorder', $page) }}" class="hidden">
                @csrf
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        (function () {
            const list = document.getElementById('section-list');
            if (!list) return;

            const saveBtn = document.querySelector('[data-save-order]');
            const reorderForm = document.getElementById('reorder-form');

            list.addEventListener('click', function (e) {
                const target = e.target;
                if (!(target instanceof HTMLElement)) return;

                const row = target.closest('[data-section-row]');
                if (!row) return;

                if (target.matches('[data-move-up]')) {
                    const prev = row.previousElementSibling;
                    if (prev) list.insertBefore(row, prev);
                }

                if (target.matches('[data-move-down]')) {
                    const next = row.nextElementSibling;
                    if (next) list.insertBefore(next, row);
                }
            });

            if (saveBtn && reorderForm) {
                saveBtn.addEventListener('click', function () {
                    reorderForm.querySelectorAll('input[name="section_ids[]"]').forEach(el => el.remove());
                    list.querySelectorAll('[data-section-row]').forEach(row => {
                        const id = row.getAttribute('data-section-id');
                        if (!id) return;
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'section_ids[]';
                        input.value = id;
                        reorderForm.appendChild(input);
                    });
                    reorderForm.submit();
                });
            }
        })();
    </script>
@endpush
