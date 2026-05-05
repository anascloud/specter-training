@extends('frontend.layouts.app')

@section('content')
    <section class="relative h-[600px] flex items-center overflow-hidden -mt-4">
        <div class="absolute inset-0 z-0">
            <img alt="Modern Classroom" class="w-full h-full object-cover"
                data-alt="Modern corporate training room with large windows, ergonomic seating, and a high-tech digital whiteboard in soft morning light"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCQoY05k-jNBUO0YmxAqoLM5DGm_5330TYZTmlU5wZAkAbZJzZTBJuR8jez1K2SkYI1nH1IH9BSzC87aMBdA1eWSnwXJ8jyvpwgQ2-iyucX3phY7sQMmLA98O57-3JaWaqb0wvkYAv5sy0pwY7ssk-alxoxK7qBlP9VZuDKcxGmeTuAuVOQTUXJOmiqEJoS7bk5GATbF7uAg7y3hvRgSiRkbcK6ll9T1VpwNMrVaEpkgfMbvRb5YDMuc2K52GzVeFS3YJ8VKfagpA">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/40 to-transparent"></div>
        </div>
        <div class="relative z-10 max-w-[1280px] mx-auto px-8 w-full">
            <div class="max-w-2xl">
                <h1 class="text-white font-display-xl text-display-xl mb-6">Empowering the Next Generation of Professionals
                </h1>
                <p class="text-slate-200 font-body-lg text-body-lg mb-8">At Specter Training, we bridge the gap between
                    academic knowledge and industry demands. Our mission is to provide world-class vocational education that
                    transforms careers and fuels professional growth.</p>
                <div class="flex gap-4">
                    <button
                        class="bg-brand-600 text-white px-8 py-4 rounded font-label-bold hover:shadow-lg transition-all">Our
                        Programs</button>
                    <button
                        class="border border-white text-white px-8 py-4 rounded font-label-bold hover:bg-white hover:text-slate-900 transition-all">Watch
                        Overview</button>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="max-w-7xl mx-auto px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
                <div class="lg:col-span-7">
                    <span class="text-brand-600 font-label-bold uppercase tracking-widest mb-4 block">Established
                        Excellence</span>
                    <h2 class="font-display-xl text-headline-lg mb-8 text-on-surface">A Legacy of Quality, A Future of
                        Innovation</h2>
                    <div class="space-y-6 text-on-surface-variant font-body-md">
                        <p>Founded with a singular vision to redefine vocational training, Specter Training has spent over
                            two
                            decades cultivating a reputation for excellence. We began as a small specialized center and have
                            evolved into a national leader in professional development.</p>
                        <p>Our commitment to excellence is reflected in our rigorous curriculum, developed in collaboration
                            with
                            industry giants. We don't just teach; we prepare our students for the realities of the modern
                            workplace, ensuring they graduate with both the confidence and the credentials to succeed.</p>
                    </div>
                </div>
                <div class="lg:col-span-5 relative">
                    <div class="aspect-square rounded-xl overflow-hidden shadow-2xl">
                        <img alt="Workshop Discussion" class="w-full h-full object-cover"
                            data-alt="Group of diverse professionals engaged in a collaborative workshop discussion around a large wooden table in a bright office"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAB_w8cKWqrBIle4cOjX83QJWeo_ysGNlIr4DJ_8bkFaaEvk9QEvO_WGYONHEsCaT8m_p7y2F-3Bv7wBgREF_gzQ772YTAzYCcGrj2Ady4Ok35G1Kvj6N0ndY66e-mmuwxHbGMeCtj8xxF9equLu9lpAZYkL5BfTTOJdhwPy6_wxIbCTZdkgbwSvJvrXM3K5BoSqA2Pq5AlpQagyCL3NPXVqKerJxJT4m4EJgkppqkg8ZFS5alQZOug7L4T-1qMRMH1Z7P6XA9uYw">
                    </div>
                    <div
                        class="absolute -bottom-6 -left-6 bg-brand-600 text-white p-8 rounded-xl shadow-xl hidden md:block">
                        <div class="text-4xl font-bold mb-1">20+</div>
                        <div class="text-sm font-label-bold uppercase opacity-80">Years of Success</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="max-w-7xl mx-auto px-8">
            <div class="text-center mb-16">
                <h2 class="font-display-xl text-headline-lg mb-4 text-on-surface">Core Values That Drive Us</h2>
                <p class="text-on-surface-variant font-body-md max-w-2xl mx-auto">Our culture is built on three foundational
                    pillars that guide every decision we make for our students.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Value 1 -->
                <div class="bg-white p-10 rounded-xl border border-slate-200 hover:shadow-xl transition-all group">
                    <div
                        class="w-14 h-14 bg-teal-50 rounded-lg flex items-center justify-center mb-6 group-hover:bg-brand-600 transition-colors">
                        <span class="material-symbols-outlined text-brand-600 text-3xl group-hover:text-white"
                            data-icon="school">school</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md mb-4">Quality Education</h3>
                    <p class="text-on-surface-variant font-body-md">We uphold the highest standards of pedagogical
                        excellence, ensuring our content is current, deep, and impactful.</p>
                </div>
                <!-- Value 2 -->
                <div class="bg-white p-10 rounded-xl border border-slate-200 hover:shadow-xl transition-all group">
                    <div
                        class="w-14 h-14 bg-teal-50 rounded-lg flex items-center justify-center mb-6 group-hover:bg-brand-600 transition-colors">
                        <span class="material-symbols-outlined text-brand-600 text-3xl group-hover:text-white"
                            data-icon="settings_input_component">settings_input_component</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md mb-4">Industry Relevance</h3>
                    <p class="text-on-surface-variant font-body-md">Our courses are designed alongside industry leaders to
                        solve real-world problems and meet actual hiring needs.</p>
                </div>
                <!-- Value 3 -->
                <div class="bg-white p-10 rounded-xl border border-slate-200 hover:shadow-xl transition-all group">
                    <div
                        class="w-14 h-14 bg-teal-50 rounded-lg flex items-center justify-center mb-6 group-hover:bg-brand-600 transition-colors">
                        <span class="material-symbols-outlined text-brand-600 text-3xl group-hover:text-white"
                            data-icon="emoji_events">emoji_events</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md mb-4">Student Success</h3>
                    <p class="text-on-surface-variant font-body-md">Your outcomes are our primary metric. We provide
                        persistent support from enrollment through to career placement.</p>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-8">
            <div class="flex flex-col lg:flex-row gap-16">
                <div class="lg:w-1/3">
                    <h2 class="font-display-xl text-headline-lg mb-6 text-on-surface">The Specter Advantage</h2>
                    <p class="text-on-surface-variant font-body-md mb-8">What sets us apart is our unwavering focus on
                        professional outcomes and practical application.</p>
                    <div class="bg-primary-container p-8 rounded-xl text-white">
                        <h4 class="font-label-bold mb-2">Want to know more?</h4>
                        <p class="text-sm opacity-80 mb-6">Download our comprehensive organizational profile and curriculum
                            overview.</p>

                        <a href="{{ route('download.brochure') }}" 
                            class="w-full border border-white/30 hover:bg-white/10 py-3 rounded font-label-bold transition-all flex items-center justify-center gap-2">
                            Download Brochure
                        </a>
                    </div>
                </div>
                <div class="lg:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex gap-4 p-6 bg-surface-container-lowest border border-slate-200 rounded-lg">
                        <span class="material-symbols-outlined text-brand-600" data-icon="verified"
                            style="font-variation-settings: 'FILL' 1;">verified</span>
                        <div>
                            <h4 class="font-label-bold text-lg mb-1">Recognized Qualifications</h4>
                            <p class="text-sm text-on-surface-variant">All our courses are fully accredited by national
                                regulatory bodies for global recognition.</p>
                        </div>
                    </div>
                    <div class="flex gap-4 p-6 bg-surface-container-lowest border border-slate-200 rounded-lg">
                        <span class="material-symbols-outlined text-brand-600" data-icon="bolt"
                            style="font-variation-settings: 'FILL' 1;">bolt</span>
                        <div>
                            <h4 class="font-label-bold text-lg mb-1">Flexible Learning</h4>
                            <p class="text-sm text-on-surface-variant">Choose from full-time, part-time, online, or hybrid
                                modes
                                that fit your lifestyle.</p>
                        </div>
                    </div>
                    <div class="flex gap-4 p-6 bg-surface-container-lowest border border-slate-200 rounded-lg">
                        <span class="material-symbols-outlined text-brand-600" data-icon="groups"
                            style="font-variation-settings: 'FILL' 1;">groups</span>
                        <div>
                            <h4 class="font-label-bold text-lg mb-1">Expert Trainers</h4>
                            <p class="text-sm text-on-surface-variant">Learn from professionals who are active practitioners
                                in
                                their respective industries.</p>
                        </div>
                    </div>
                    <div class="flex gap-4 p-6 bg-surface-container-lowest border border-slate-200 rounded-lg">
                        <span class="material-symbols-outlined text-brand-600" data-icon="trending_up"
                            style="font-variation-settings: 'FILL' 1;">trending_up</span>
                        <div>
                            <h4 class="font-label-bold text-lg mb-1">Career Support</h4>
                            <p class="text-sm text-on-surface-variant">Comprehensive resume workshops, interview prep, and
                                exclusive hiring partner networks.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
