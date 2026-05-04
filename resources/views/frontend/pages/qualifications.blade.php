@extends('frontend.layouts.app')

@section('content')
    <section class="py-0 md:py-8 lg:py-12">
        <div class="max-w-7xl mx-auto px-8">
            <h1 class="lg:text-4xl md:text-3xl text-2xl font-bold text-slate-900 mb-3">Qualifications Catalog</h1>
            <p class="font-body-md text-slate-500 leading-relaxed mb-6 w-full lg:w-1/2">Explore our nationally recognized
                training programs designed to elevate your professional trajectory and secure your future in high-growth
                industries.</p>
        </div>
    </section>

    <section>
        <div class="max-w-7xl mx-auto px-8">
            <div class="border border-gray-200 p-4 bg-white rounded-md">
                <form id="qualification-filter-form" method="GET" action="{{ route('qualifications-page') }}"
                    class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search courses..."
                        class="dark:bg-dark-900 focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">

                    <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                        <select name="industry"
                            class="dark:bg-dark-900 focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                            :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                            @change="isOptionSelected = true">
                            <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                All Industries
                            </option>
                            @foreach ($industries as $industry)
                                <option value="{{ $industry }}" {{ strtolower(request('industry', '')) === strtolower($industry) ? 'selected' : '' }}>
                                    {{ $industry }}
                                </option>
                            @endforeach
                        </select>
                        <span
                            class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>

                    <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                        <select name="level"
                            class="dark:bg-dark-900 focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                            :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                            @change="isOptionSelected = true">
                            <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                All Levels
                            </option>
                            @foreach ($levels as $level)
                                <option value="{{ $level }}" {{ strtolower(request('level', '')) === strtolower($level) ? 'selected' : '' }}>
                                    {{ $level }}
                                </option>
                            @endforeach
                        </select>
                        <span
                            class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                    {{-- <button
                    class="bg-teal-600 text-white rounded px-4 lg:px-8 py-2.5 font-medium text-base active:scale-95 transition-transform mt-4"
                    type="submit">
                    Filter/Search
                </button> --}}

                </form>
            </div>

            <div id="qualification-results"
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 md:gap-6 gap-4 mt-6 md:mt-8 transition-opacity duration-200"
                aria-live="polite">
                @include('frontend.pages.partials.qualification-cards', ['courses' => $courses])
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.querySelector('#qualification-filter-form');
            const results = document.querySelector('#qualification-results');

            if (!form || !results) {
                return;
            }

            let debounceTimer;
            let activeController;

            const updateResults = () => {
                const formData = new FormData(form);
                const params = new URLSearchParams();

                formData.forEach((value, key) => {
                    if (value) {
                        params.set(key, value);
                    }
                });

                const url = `${form.action}${params.toString() ? `?${params.toString()}` : ''}`;

                if (activeController) {
                    activeController.abort();
                }

                activeController = new AbortController();
                results.classList.add('opacity-50');

                fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                        },
                        signal: activeController.signal,
                    })
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error('Unable to load courses.');
                        }

                        return response.json();
                    })
                    .then((data) => {
                        results.innerHTML = data.html;
                        window.history.replaceState({}, '', url);
                    })
                    .catch((error) => {
                        if (error.name !== 'AbortError') {
                            form.submit();
                        }
                    })
                    .finally(() => {
                        results.classList.remove('opacity-50');
                    });
            };

            form.addEventListener('submit', (event) => {
                event.preventDefault();
                updateResults();
            });

            form.querySelectorAll('select').forEach((select) => {
                select.addEventListener('change', updateResults);
            });

            form.querySelector('input[name="search"]')?.addEventListener('input', () => {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(updateResults, 300);
            });
        });
    </script>
@endpush
