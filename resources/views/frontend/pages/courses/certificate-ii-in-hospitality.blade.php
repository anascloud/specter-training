@extends('frontend.layouts.app')

@section('content')
    <section class="-mt-4">
        <div class="relative overflow-hidden">

            {{-- Background Image --}}
            <div class="absolute inset-0">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7DRrvrvyU6gG3zu1OoJa0eKcBclew-hkiW7KRzYWA9k11jhh5ZyY2eDs55VfW3un8abNaMpHKhtxkIhfIEprKBHJSD5rPdWzDeIIJawl6w6h6oaOZix9sHWrg3p5q_MOnGJ8LJhjQOj2EOy8H3WdOkXDkkgcCudyr1rPLrYSEOdpIyvrzLDs4FGECXeHcCdCFcB-VGsSKyzwtrMJbhYpRy-KmX6_NotI7hAvGJq2_zqGJHbBnxdJXqkR5m9rsyBGwDDv_L2KNFA"
                    alt="Hospitality" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/70"></div>
            </div>

            {{-- Content --}}
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 sm:py-20 lg:py-28">

                {{-- Badge --}}
                <div
                    class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 
                        px-3 sm:px-4 py-2 rounded-full mb-5 sm:mb-8">

                    <span class="material-symbols-outlined text-sm sm:text-base">
                        School
                    </span>

                    <span class="text-[10px] sm:text-xs md:text-sm font-semibold tracking-widest uppercase">
                        SIT40416 Nationally Recognised
                    </span>
                </div>

                {{-- Title --}}
                <h1
                    class="text-xl sm:text-2xl md:text-3xl lg:text-4xl 
                       font-bold text-white leading-tight max-w-4xl mb-4 sm:mb-12">
                    Certificate IV in Hospitality
                </h1>

                {{-- Info Cards --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">

                    {{-- Duration --}}
                    <div
                        class="bg-white/10 backdrop-blur-md border border-white/20 
                            rounded-2xl p-2.5 sm:p-3 flex items-center gap-4">

                        <div
                            class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl bg-white/10 
                                flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-xl">
                                schedule
                            </span>
                        </div>

                        <div>
                            <p class="text-white/70 text-xs sm:text-sm mb-1">
                                Duration
                            </p>
                            <p class="text-white font-semibold text-sm sm:text-base md:text-lg">
                                12 Months
                            </p>
                        </div>
                    </div>


                    {{-- Level --}}
                    <div
                        class="bg-white/10 backdrop-blur-md border border-white/20 
                            rounded-2xl p-2.5 sm:p-3 flex items-center gap-4">

                        <div
                            class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl bg-white/10 
                                flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-xl">
                                equalizer
                            </span>
                        </div>

                        <div>
                            <p class="text-white/70 text-xs sm:text-sm mb-1">
                                Level
                            </p>
                            <p class="text-white font-semibold text-sm sm:text-base md:text-lg">
                                Advanced Skillset
                            </p>
                        </div>
                    </div>


                    {{-- Price --}}
                    <div
                        class="bg-white/10 backdrop-blur-md border border-white/20 
                            rounded-2xl p-2.5 sm:p-3 flex items-center gap-4">

                        <div
                            class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl bg-white/10 
                                flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-xl">
                                payments
                            </span>
                        </div>

                        <div>
                            <p class="text-white/70 text-xs sm:text-sm mb-1">
                                Investment
                            </p>
                            <p class="text-white font-semibold text-sm sm:text-base md:text-lg">
                                $2,450.00
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="max-w-7xl mx-auto px-8 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Left Content Area -->
                <div class="lg:col-span-8 space-y-16">
                    <!-- Overview Section -->
                    <section id="overview">
                        <h2 class="font-headline-lg text-headline-lg mb-6 flex items-center gap-3">
                            <span class="w-8 h-1 bg-brand-600 inline-block"></span>
                            Course Overview
                        </h2>
                        <div class="prose prose-slate max-w-none">
                            <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed mb-6">
                                The SIT40416 Certificate IV in Hospitality reflects the role of highly skilled operators who
                                use a broad range of hospitality skills combined with managerial skills and sound knowledge
                                of industry operations to coordinate hospitality operations. They operate independently,
                                have responsibility for others and make a range of operational business decisions.
                            </p>
                            <p class="font-body-md text-body-md text-on-surface-variant">
                                This qualification provides a pathway to work as a team leader or supervisor in various
                                hospitality settings, such as restaurants, hotels, catering operations, clubs, pubs, cafes,
                                and coffee shops.
                            </p>
                        </div>
                    </section>
                    <!-- Curriculum Bento Grid -->
                    <section id="curriculum">
                        <h2 class="font-headline-lg text-headline-lg mb-8 flex items-center gap-3">
                            <span class="w-8 h-1 brand-600 inline-block"></span>
                            Course Structure
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Core Modules -->
                            <div
                                class="bg-white border border-slate-200 p-8 rounded shadow-sm hover:shadow-md transition-all">
                                <span class="material-symbols-outlined text-brand-600 mb-4"
                                    style="font-size: 32px;">verified</span>
                                <h3 class="font-headline-md text-headline-md mb-4">Core Modules</h3>
                                <ul class="space-y-3 font-body-md text-on-surface-variant">
                                    <li class="flex items-start gap-2">
                                        <span class="material-symbols-outlined text-xs mt-1">check_circle</span>
                                        Manage conflict
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <span class="material-symbols-outlined text-xs mt-1">check_circle</span>
                                        Manage finances within a budget
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <span class="material-symbols-outlined text-xs mt-1">check_circle</span>
                                        Lead and manage people
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <span class="material-symbols-outlined text-xs mt-1">check_circle</span>
                                        Monitor work operations
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <span class="material-symbols-outlined text-xs mt-1">check_circle</span>
                                        Manage diversity in the workplace
                                    </li>
                                </ul>
                            </div>
                            <!-- Electives -->
                            <div class="bg-slate-50 border border-slate-200 p-8 rounded">
                                <span class="material-symbols-outlined text-slate-500 mb-4"
                                    style="font-size: 32px;">category</span>
                                <h3 class="font-headline-md text-headline-md mb-4">Electives</h3>
                                <p class="text-on-surface-variant mb-4">Choose 9 electives from categories including:</p>
                                <div class="flex flex-wrap gap-2">
                                    <span
                                        class="bg-white px-3 py-1 border border-slate-200 rounded text-xs font-label-bold text-on-surface-variant">Kitchen
                                        Management</span>
                                    <span
                                        class="bg-white px-3 py-1 border border-slate-200 rounded text-xs font-label-bold text-on-surface-variant">Bar
                                        Operations</span>
                                    <span
                                        class="bg-white px-3 py-1 border border-slate-200 rounded text-xs font-label-bold text-on-surface-variant">WHS
                                        Management</span>
                                    <span
                                        class="bg-white px-3 py-1 border border-slate-200 rounded text-xs font-label-bold text-on-surface-variant">Events</span>
                                    <span
                                        class="bg-white px-3 py-1 border border-slate-200 rounded text-xs font-label-bold text-on-surface-variant">Marketing</span>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Outcomes Section -->
                    <section class="bg-surface-container p-10 rounded" id="outcomes">
                        <div class="flex flex-col md:flex-row gap-12">
                            <div class="flex-1">
                                <h2 class="font-headline-lg text-headline-lg mb-6">Career Outcomes</h2>
                                <p class="font-body-md text-on-surface-variant mb-6">Upon successful completion of this
                                    qualification, students are prepared for leadership roles in the global hospitality
                                    sector.</p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div class="flex items-center gap-3 bg-white p-4 rounded border border-slate-200">
                                        <span
                                            class="material-symbols-outlined text-brand-600">person_celebrate</span>
                                        <span class="font-label-bold">Duty Manager</span>
                                    </div>
                                    <div class="flex items-center gap-3 bg-white p-4 rounded border border-slate-200">
                                        <span class="material-symbols-outlined text-brand-600">restaurant</span>
                                        <span class="font-label-bold">Restaurant Manager</span>
                                    </div>
                                    <div class="flex items-center gap-3 bg-white p-4 rounded border border-slate-200">
                                        <span class="material-symbols-outlined text-brand-600">liquor</span>
                                        <span class="font-label-bold">Bar Supervisor</span>
                                    </div>
                                    <div class="flex items-center gap-3 bg-white p-4 rounded border border-slate-200">
                                        <span class="material-symbols-outlined text-brand-600">bed</span>
                                        <span class="font-label-bold">Front Office Manager</span>
                                    </div>
                                </div>
                            </div>
                            <div class="md:w-1/3">
                                <img alt="Hospitality professional in action"
                                    class="rounded-lg shadow-lg w-full h-full object-cover"
                                    data-alt="professional male manager in a crisp suit standing in a modern luxury hotel lobby, blurred background, warm interior lighting"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAbBIEMlEEqMe0sC6KvqTxAyaFamqAN-mswEaNfIEQl3K30Gu_ThLpKe5HtIxY2I5w0Xm0eTBjyc1whn72mktjoT9AEbIVLyQUi2Ciubqv0hgS9Rny6Xaw1iKJ4h0EoTslKXMaYzi2HS5891hSLG_a0rVUH2FDXEIM0wtPKaYNFbammzks12W3GtTOoyRg52fol-jzsnZUuT5wLpbWmZUQep3Zql0zZHwmzez2sVjGZI1j9OFuBGlIUNY09cgX_ChNZeuCRRkxcAQ">
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Right Sticky Sidebar -->
                <aside class="lg:col-span-4">
                    <div class="sticky-sidebar sticky space-y-6">
                        <!-- Quick Apply Form -->
                        <div class="bg-white border border-slate-200 rounded-lg shadow-sm p-8 overflow-hidden relative">
                            <div class="absolute top-0 left-0 w-1 h-full brand-600"></div>
                            <div class="mb-6">
                                <h3 class="font-headline-md text-headline-md mb-2">Quick Apply</h3>
                                <p class="text-caption font-caption text-on-surface-variant">Start your application in under
                                    2 minutes.</p>
                            </div>
                            <form class="space-y-4">
                                <div>
                                    <label
                                        class="block text-xs font-label-bold uppercase tracking-wider mb-2 text-on-surface-variant">Full
                                        Name</label>
                                    <input
                                        class="w-full border border-slate-300 rounded px-4 py-3 focus:border-brand-600 focus:ring-0 transition-colors bg-slate-50"
                                        type="text">
                                </div>
                                <div>
                                    <label
                                        class="block text-xs font-label-bold uppercase tracking-wider mb-2 text-on-surface-variant">Email
                                        Address</label>
                                    <input
                                        class="w-full border border-slate-300 rounded px-4 py-3 focus:border-brand-600 focus:ring-0 transition-colors bg-slate-50"
                                        type="email">
                                </div>
                                <div>
                                    <label
                                        class="block text-xs font-label-bold uppercase tracking-wider mb-2 text-on-surface-variant">Phone
                                        Number</label>
                                    <input
                                        class="w-full border border-slate-300 rounded px-4 py-3 focus:border-brand-600 focus:ring-0 transition-colors bg-slate-50"
                                        type="tel">
                                </div>
                                <button
                                    class="w-full brand-600 text-white py-4 rounded font-label-bold uppercase tracking-widest text-sm hover:brightness-110 active:scale-[0.98] transition-all mt-4"
                                    type="submit">
                                    Apply Now
                                </button>
                            </form>
                            <!-- Enrollment Deadline -->
                            <div class="mt-8 pt-8 border-t border-slate-100">
                                <div class="flex items-start gap-4">
                                    <div
                                        class="w-12 h-12 bg-error-container text-on-error-container rounded flex items-center justify-center shrink-0">
                                        <span class="material-symbols-outlined">event_busy</span>
                                    </div>
                                    <div>
                                        <p class="font-label-bold text-sm text-error">Next Intake Closes</p>
                                        <p class="font-headline-md text-on-surface">Oct 14, 2024</p>
                                        <p class="text-caption font-caption text-on-surface-variant mt-1">Only 6 spots
                                            remaining for this cohort.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Secondary Actions -->
                        <div class="grid grid-cols-1 gap-4">
                            <button
                                class="flex items-center justify-center gap-3 w-full border border-primary-container text-primary-container py-3 rounded font-label-bold hover:bg-slate-50 transition-colors">
                                <span class="material-symbols-outlined text-sm">download</span>
                                Download Brochure
                            </button>
                            <button
                                class="flex items-center justify-center gap-3 w-full bg-slate-100 text-on-surface-variant py-3 rounded font-label-bold hover:bg-slate-200 transition-colors">
                                <span class="material-symbols-outlined text-sm">mail</span>
                                Enquire via Email
                            </button>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
