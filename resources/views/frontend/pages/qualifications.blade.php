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
                <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
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
                            <option value="hospitality" {{ request('industry') == 'hospitality' ? 'selected' : '' }}>
                                Hospitality
                            </option>
                            <option value="retail" {{ request('industry') == 'retail' ? 'selected' : '' }}>
                                Retail
                            </option>
                            <option value="business" {{ request('industry') == 'business' ? 'selected' : '' }}>
                                Business
                            </option>
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
                            <option value="certificate-ii" {{ request('level') == 'certificate-ii' ? 'selected' : '' }}>
                                Certificate II
                            </option>
                            <option value="certificate-iii" {{ request('level') == 'certificate-iii' ? 'selected' : '' }}>
                                Certificate III
                            </option>
                            <option value="certificate-iv" {{ request('level') == 'certificate-iv' ? 'selected' : '' }}>
                                Certificate IV
                            </option>
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

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 md:gap-6 gap-4  mt-6 md:mt-8">
                @forelse($courses as $course)
                    <div class="qualification-card bg-white border border-slate-200 transition-all duration-300 rounded-md">
                        <div class="h-48 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                                data-alt="luxury hotel lobby interior with warm ambient lighting and professional reception staff"
                                src="{{ asset('frontend-img/' . $course['image']) }}" alt="{{ $course['title'] }}">
                        </div>
                        <div class="p-6 space-y-4">
                            <span
                                class="text-caption text-xs text-brand-600 bg-brand-600/10 font-semibold px-2 py-1 uppercase rounded">{{ $course['industry'] }}</span>
                            <h3 class="font-semibold text-slate-900  md:text-base text-sm leading-tight mt-2">
                                {{ $course['title'] }}</h3>
                            <p class="text-slate-600 text-sm line-clamp-2">{{ $course['description'] }}</p>
                            <div class="pt-4 border-t border-slate-100 flex items-center justify-between gap-6">
                                <a href="#"
                                    class="flex justify-center items-center w-1/2 bg-white border border-teal-600 text-teal-600 hover:bg-teal-600 hover:text-white rounded py-1.5 font-medium text-sm transition-transform">View
                                    Details</a>
                                <button
                                    class="w-1/2 bg-teal-600 text-white rounded py-2 font-medium text-sm  transition-transform"
                                    type="submit">
                                    Enroll Now
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No courses found.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
