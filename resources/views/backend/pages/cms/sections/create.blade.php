@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-white/90">
                    {{ $title ?? 'Add Section' }}
                </h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Page: {{ $page->title }}
                </p>
            </div>
            <a
                href="{{ route('admin.cms.pages.sections.index', $page) }}"
                class="rounded-lg border border-gray-200 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-white/5"
            >
                Back
            </a>
        </div>

        @if ($errors->any())
            <div class="rounded-lg border border-error-200 bg-error-50 px-4 py-3 text-sm text-error-700 dark:border-error-800/50 dark:bg-error-900/20 dark:text-error-200">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">
            <form method="POST" action="{{ route('admin.cms.pages.sections.store', $page) }}" class="space-y-5">
                @csrf

                <div class="grid gap-5 lg:grid-cols-3">
                    <div class="lg:col-span-2 space-y-5">
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Section Name</label>
                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                            />
                        </div>

                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Content</label>
                            <textarea
                                id="content"
                                name="content"
                                rows="10"
                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                            >{{ old('content') }}</textarea>
                        </div>

                        <div class="flex items-center gap-2">
                            <button
                                type="button"
                                data-preview
                                class="rounded-lg border border-gray-200 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-white/5"
                            >
                                Preview
                            </button>
                            <button
                                type="submit"
                                class="inline-flex items-center justify-center rounded-lg bg-brand-500 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600"
                            >
                                Save Section
                            </button>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Section Type</label>
                            <select
                                name="type"
                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
                            >
                                @foreach ($types as $key => $label)
                                    <option value="{{ $key }}" @selected(old('type', 'custom') === $key)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Custom CSS Classes (optional)</label>
                            <input
                                type="text"
                                name="css_classes"
                                value="{{ old('css_classes') }}"
                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                            />
                        </div>

                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">JSON Content (optional)</label>
                            <textarea
                                name="content_json"
                                rows="6"
                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                placeholder='{"type":"hero","data":{}}'
                            >{{ old('content_json') }}</textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div
            id="preview-modal"
            class="fixed inset-0 z-[99999] hidden items-center justify-center bg-gray-900/60 p-6"
        >
            <div class="w-full max-w-4xl overflow-hidden rounded-2xl bg-white shadow-theme-lg dark:bg-gray-900">
                <div class="flex items-center justify-between border-b border-gray-100 px-6 py-4 dark:border-gray-800">
                    <div class="text-lg font-semibold text-gray-800 dark:text-white/90">Preview</div>
                    <button type="button" data-close-preview class="rounded-lg border border-gray-200 px-3 py-1.5 text-sm text-gray-700 hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-white/5">
                        Close
                    </button>
                </div>
                <div class="max-h-[70vh] overflow-auto p-6">
                    <div id="preview-body" class="prose max-w-none dark:prose-invert"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/super-build/ckeditor.js"></script>
    <script>
        (function () {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
            const textarea = document.getElementById('content');
            const previewBtn = document.querySelector('[data-preview]');
            const modal = document.getElementById('preview-modal');
            const closeBtn = document.querySelector('[data-close-preview]');
            const previewBody = document.getElementById('preview-body');
            let editorInstance = null;

            if (!textarea) return;

            CKEDITOR.ClassicEditor.create(textarea, {
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'underline', '|',
                        'link', 'bulletedList', 'numberedList', '|',
                        'insertTable', 'imageUpload', 'blockQuote', 'codeBlock', '|',
                        'undo', 'redo', '|',
                        'sourceEditing'
                    ],
                    shouldNotGroupWhenFull: true
                },
                simpleUpload: {
                    uploadUrl: "{{ route('admin.cms.media.upload') }}",
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                },
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true
                        }
                    ]
                },
                style: {
                    definitions: [
                        { name: 'Text Center', element: 'p', classes: ['text-center'] },
                        { name: 'Text Brand', element: 'span', classes: ['text-brand-500'] },
                        { name: 'Button', element: 'a', classes: ['inline-flex', 'items-center', 'justify-center', 'rounded-lg', 'bg-brand-500', 'px-4', 'py-2', 'text-white'] }
                    ]
                }
            }).then(editor => {
                editorInstance = editor;
            });

            function openPreview(html) {
                if (!modal || !previewBody) return;
                previewBody.innerHTML = html;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }

            function closePreview() {
                if (!modal) return;
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }

            if (closeBtn) {
                closeBtn.addEventListener('click', closePreview);
            }

            if (modal) {
                modal.addEventListener('click', function (e) {
                    if (e.target === modal) closePreview();
                });
            }

            if (previewBtn) {
                previewBtn.addEventListener('click', async function () {
                    const content = editorInstance ? editorInstance.getData() : textarea.value;
                    const res = await fetch("{{ route('admin.cms.sections.preview') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({ content })
                    });
                    const data = await res.json();
                    openPreview(data.html || '');
                });
            }
        })();
    </script>
@endpush
