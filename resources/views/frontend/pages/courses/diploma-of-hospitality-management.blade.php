@extends('frontend.layouts.app')

@section('content')

    {{-- Hero Section --}}
    <section class="-mt-4">
        <div class="relative overflow-hidden">

            {{-- Background --}}
            <div class="absolute inset-0">
                <img
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7DRrvrvyU6gG3zu1OoJa0eKcBclew-hkiW7KRzYWA9k11jhh5ZyY2eDs55VfW3un8abNaMpHKhtxkIhfIEprKBHJSD5rPdWzDeIIJawl6w6h6oaOZix9sHWrg3p5q_MOnGJ8LJhjQOj2EOy8H3WdOkXDkkgcCudyr1rPLrYSEOdpIyvrzLDs4FGECXeHcCdCFcB-VGsSKyzwtrMJbhYpRy-KmX6_NotI7hAvGJq2_zqGJHbBnxdJXqkR5m9rsyBGwDDv_L2KNFA"
                    alt="Hospitality"
                    class="w-full h-full object-cover">

                <div class="absolute inset-0 bg-black/70"></div>
            </div>

            {{-- Content --}}
            <div class="relative max-w-7xl mx-auto px-5 md:px-8 py-12 sm:py-16 lg:py-24">

                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 px-3 py-2 rounded-full mb-5">

                    <span class="material-symbols-outlined text-sm">
                        school
                    </span>

                    <span class="text-xs font-semibold tracking-widest uppercase text-white">
                        SIT40421 Nationally Recognised
                    </span>

                </div>

                {{-- Title --}}
                <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-white leading-tight max-w-4xl mb-6 sm:mb-10">
                    Certificate IV in Hospitality
                </h1>

                {{-- Info Cards --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                    {{-- Duration --}}
                    <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-3 flex items-center gap-4">

                        <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined">
                                schedule
                            </span>
                        </div>

                        <div>
                            <p class="text-white/70 text-xs mb-1">
                                Duration
                            </p>

                            <p class="text-white font-semibold">
                                12 Months
                            </p>
                        </div>

                    </div>

                    {{-- Level --}}
                    <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-3 flex items-center gap-4">

                        <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined">
                                equalizer
                            </span>
                        </div>

                        <div>
                            <p class="text-white/70 text-xs mb-1">
                                Level
                            </p>

                            <p class="text-white font-semibold">
                                Advanced Skillset
                            </p>
                        </div>

                    </div>

                    {{-- Fees --}}
                    <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-3 flex items-center gap-4">

                        <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined">
                                payments
                            </span>
                        </div>

                        <div>
                            <p class="text-white/70 text-xs mb-1">
                                Investment
                            </p>

                            <p class="text-white font-semibold">
                                $2,450.00
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>


    {{-- Main Section --}}
    <section>
        <div class="max-w-7xl mx-auto px-5 md:px-8 py-10 sm:py-14 lg:py-16">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">

                {{-- Left Content --}}
                <div class="lg:col-span-8 space-y-12">

                    {{-- Overview --}}
                    <section id="overview">

                        <h2 class="font-headline-lg text-headline-lg mb-5 flex items-center gap-3">
                            <span class="w-8 h-1 bg-brand-600 inline-block"></span>
                            Course Overview
                        </h2>

                        <div class="prose prose-slate max-w-none">

                            <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed mb-5">
                                The Certificate IV in Hospitality reflects the role of skilled hospitality professionals
                                who use a broad range of hospitality service, operational, and leadership skills.
                                Students learn how to coordinate hospitality operations, supervise teams, and
                                make operational business decisions across different service environments.
                            </p>

                            <p class="font-body-md text-body-md text-on-surface-variant">
                                This qualification prepares learners for supervisory and leadership roles
                                in restaurants, hotels, catering operations, clubs, cafés, bars,
                                and other hospitality venues.
                            </p>

                        </div>

                    </section>


                    {{-- Course Structure --}}
                    <section id="curriculum">

                        <h2 class="font-headline-lg text-headline-lg mb-6 flex items-center gap-3">
                            <span class="w-8 h-1 bg-brand-600 inline-block"></span>
                            Course Structure
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            {{-- Core --}}
                            <div class="bg-white border border-slate-200 p-6 rounded shadow-sm">

                                <span class="material-symbols-outlined text-brand-600 mb-4 text-3xl">
                                    verified
                                </span>

                                <h3 class="font-headline-md text-headline-md mb-4">
                                    Core Modules
                                </h3>

                                <ul class="space-y-3 text-on-surface-variant">

                                    <li class="flex gap-2">
                                        <span class="material-symbols-outlined text-xs mt-1">check_circle</span>
                                        Manage conflict
                                    </li>

                                    <li class="flex gap-2">
                                        <span class="material-symbols-outlined text-xs mt-1">check_circle</span>
                                        Manage finances within a budget
                                    </li>

                                    <li class="flex gap-2">
                                        <span class="material-symbols-outlined text-xs mt-1">check_circle</span>
                                        Lead and manage people
                                    </li>

                                    <li class="flex gap-2">
                                        <span class="material-symbols-outlined text-xs mt-1">check_circle</span>
                                        Monitor work operations
                                    </li>

                                    <li class="flex gap-2">
                                        <span class="material-symbols-outlined text-xs mt-1">check_circle</span>
                                        Manage workplace diversity
                                    </li>

                                </ul>

                            </div>


                            {{-- Electives --}}
                            <div class="bg-slate-50 border border-slate-200 p-6 rounded">

                                <span class="material-symbols-outlined text-slate-500 mb-4 text-3xl">
                                    category
                                </span>

                                <h3 class="font-headline-md text-headline-md mb-4">
                                    Electives
                                </h3>

                                <p class="text-on-surface-variant mb-4">
                                    Choose elective units from areas such as:
                                </p>

                                <div class="flex flex-wrap gap-2">

                                    <span class="bg-white px-3 py-1 border rounded text-xs">
                                        Kitchen Management
                                    </span>

                                    <span class="bg-white px-3 py-1 border rounded text-xs">
                                        Bar Operations
                                    </span>

                                    <span class="bg-white px-3 py-1 border rounded text-xs">
                                        WHS Management
                                    </span>

                                    <span class="bg-white px-3 py-1 border rounded text-xs">
                                        Events
                                    </span>

                                    <span class="bg-white px-3 py-1 border rounded text-xs">
                                        Marketing
                                    </span>

                                </div>

                            </div>

                        </div>

                    </section>


                    {{-- Outcomes --}}
                    <section class="bg-surface-container p-6 sm:p-8 rounded" id="outcomes">

                        <h2 class="font-headline-lg text-headline-lg mb-6">
                            Career Outcomes
                        </h2>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                            <div class="bg-white p-4 rounded border">
                                Duty Manager
                            </div>

                            <div class="bg-white p-4 rounded border">
                                Restaurant Manager
                            </div>

                            <div class="bg-white p-4 rounded border">
                                Bar Supervisor
                            </div>

                            <div class="bg-white p-4 rounded border">
                                Front Office Manager
                            </div>

                        </div>

                    </section>

                </div>


                {{-- Sidebar --}}
                <aside class="lg:col-span-4">

                    <div class="lg:sticky lg:top-24 space-y-6">

                        {{-- Form --}}
                        <div class="bg-white border border-slate-200 rounded-lg shadow-sm p-6">

                            <div class="mb-6">

                                <h3 class="font-headline-md mb-2">
                                    Quick Apply
                                </h3>

                                <p class="text-sm text-on-surface-variant">
                                    Start your application in under 2 minutes.
                                </p>

                            </div>

                            <form class="space-y-4">

                                <x-form.input-text
                                    label="Full Name"
                                    name="full_name"
                                    placeholder="John Doe"
                                    type="text" />

                                <x-form.input-text
                                    label="Email Address"
                                    name="email"
                                    placeholder="john@example.com"
                                    type="email" />

                                <x-form.input-text
                                    label="Phone Number"
                                    name="phone"
                                    placeholder="+1 (555) 000-0000"
                                    type="tel" />

                                <button
                                    type="submit"
                                    class="w-full bg-teal-600 text-white rounded py-3 font-semibold">

                                    Apply Now

                                </button>

                            </form>

                        </div>


                        {{-- Actions --}}
                        <div class="grid gap-4">

                            <a
                                href="{{ route('download.brochure') }}"
                                class="w-full border border-slate-300 py-3 rounded text-center font-semibold">

                                Download Brochure

                            </a>

                            <a
                                href="mailto:mannan.hbdservices@gmail.com"
                                class="w-full bg-slate-100 py-3 rounded flex justify-center items-center gap-2 font-semibold">

                                <span class="material-symbols-outlined text-sm">
                                    mail
                                </span>

                                Enquire via Email

                            </a>

                        </div>

                    </div>

                </aside>

            </div>

        </div>
    </section>

@endsection