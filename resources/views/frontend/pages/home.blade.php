@extends('frontend.layouts.app')

@section('content')
    <section class="hero-gradient overflow-hidden -mt-10">
        <div class="max-w-7xl mx-auto px-5 lg:px-8 py-12 md:py-20 lg:py-32 grid lg:grid-cols-2 gap-16 items-center">
            <div class="space-y-5 sm:space-y-6 lg:space-y-8">

                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white border border-slate-200 rounded-full">
                    <span class="w-2 h-2 rounded-full bg-teal-600 shrink-0"></span>
                    <span class="font-semibold text-caption uppercase tracking-wider text-slate-600 text-[11px] sm:text-xs">
                        Nationally Accredited Training
                    </span>
                </div>
                {{-- Heading --}}
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-slate-900 leading-tight max-w-2xl">
                    Elevate Your Career with
                    <span class="text-teal-600">
                        Industry-Leading
                    </span>
                    Qualifications.
                </h1>


                {{-- Description --}}
                <p class="text-sm sm:text-base md:text-lg lg:text-xl text-slate-600 max-w-xl leading-relaxed">
                    Gain the skills and recognition you need to excel in today's competitive
                    job market through our specialized professional development programs.
                </p>


                {{-- CTA + Social Proof --}}
                <div class="flex flex-col sm:flex-row sm:flex-wrap sm:items-center gap-4 sm:gap-5">

                    {{-- Button --}}
                    <a href="/qualifications"
                        class="w-full sm:w-auto text-center bg-teal-600 text-white rounded-full px-6 sm:px-8 py-3 sm:py-4 font-semibold shadow-lg shadow-teal-900/20 active:scale-95 transition-all">

                        Explore All Courses

                    </a>


                    {{-- Students --}}
                    <div class="flex flex-wrap items-center gap-3">

                        {{-- Avatars --}}
                        <div class="flex -space-x-3">

                            <img class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border-2 border-white object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDG-4z1G68oQl-iGXiNYqGO3Yk26VB5WfqeAMhffyIz4YQFTWmEIRvh06FjhfKw3r6n3gmV3nkzfefju3jUrTyjy3jgvjtcnZErBZHYMlvy48LVfyZAfXNJrqkSuFDhEpeLfS3Inc19657BKI25hJJjOiRdJUzxKXuInZ8lPO43vrCfeDieCnmfHuxP6bmxZC_jvKlIvdITi0Q9aGU9DWairVcw-ujOtZNXzV-hfcO0oU3FXELuz9op6aKg4dEEfdhZMzTIRZSdzw">

                            <img class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border-2 border-white object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBHlSf5WdrLHKl1ibjPuvDYLhdzssgapeCNQhzWAs-kUqHFSJpiVBGvtG7j8XL9zRTqxkxsm5eZNrHk0_y_SMoivLMSxViylcwj354xgAvCS3EGR2_HeKsmM6lz5XLsBAWXQ8knFci4pOjpzL7MfwtK-aQjc9WSUKLg87qEWtn5PTMmN19a-QEgdZq1aPR4gLPb05gKc_CGXRrWAI0pPmHjF4J2BsBWrmE9BbDhEM_mQRTD20tbY3upRSFrc345oNFlDueGRCJEgw">

                            <img class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border-2 border-white object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBDPaIO2t11KyDe5cCI6etrcRdFYBBLRBX1zVW4ks0o7i3MKBaxY6rwOrHrsg_9N2giyU4uWj1c_tBsI-jQtFbbaxvpjBzh9reL6y40xPCIuLyhVku4FyTP9ITLlWoeDWJ2cqau8NhpkuRQmhjlWrdvR9t-J1n3VxZ9KjXEfrsCWBReimdebq4E86ecGOQvXI7NHFC99EGTWKfCaBJrnoSgkaosNbe2nQO8ocumfzCk2dztTcSfoko8Y3sC3lPdhp0fph5VAXRDNg">

                        </div>


                        {{-- Text --}}
                        <span class="text-caption font-semibold text-slate-500 text-sm">
                            Joined by 2,000+ Students
                        </span>

                    </div>

                </div>

            </div>
            <!-- Conversion Form -->
            <div class="bg-white p-4 md:p-8 lg:p-10 border border-slate-200 shadow-xl relative rounded-md">
                <div class="absolute top-0 right-0 w-32 h-32 bg-teal-600/20 -z-10 translate-x-8 -translate-y-8">
                </div>
                <div class="space-y-6">
                    <h2 class="font-headline-md text-headline-md text-slate-900">Apply for Admission</h2>
                    <p class="text-slate-500 font-body-md">Fill out the form below and an education consultant will contact
                        you within 24 hours.</p>
                    <form class="space-y-3">
                        <x-form.input-text label="Full Name" name="full_name" placeholder="John Doe" type="text" />
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <x-form.input-text label="Email Address" name="email" placeholder="john@example.com"
                                type="email" />
                            <x-form.input-text label="Phone Number" name="phone" placeholder="+1 (555) 000-0000"
                                type="tel" />
                        </div>
                        <x-form.select-input name="type" label="Type" value="Hospitality Management" :options="[
                            'retail-operations' => 'Retail Operations',
                            'advanced-manufacturing' => 'Advanced Manufacturing',
                            'business-administration' => 'Business Administration',
                        ]" />
                        <button
                            class="w-full bg-teal-600 text-white rounded py-2.5 font-semibold text-base active:scale-95 transition-transform mt-4"
                            type="submit">
                            Submit Application
                        </button>
                        <p class="text-center text-xs md:text-sm text-slate-400 ">By submitting, you agree to our Privacy
                            Policy.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white py-12 border-y border-slate-100">
        <div class="max-w-7xl mx-auto px-5 md:px-8">
            <p class="text-center text-caption font-semibold text-slate-400 uppercase tracking-[0.2em] mb-8">Authorized
                Training Provider</p>
            <div
                class="flex flex-wrap justify-center items-center gap-12 opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
                <img class="h-8 object-contain"
                    data-alt="clean geometric logo of a professional education authority in black and white"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDaaDDmB5K3ELXnrgsQ4k2IBc8_x3-BJTCCTXhbQ3mc9IRvjcZlOpdxrlpjkX5MaamAYeqwiySROL4C7HoGcnr0rBoPSFZq9VzAZz07YoyoAghQ8Peom8OLf0snI6eFEXGHaK2RVfjj0DLEC_zTTA7WSFXKougbJQssag8KGsCHv16rMV1baNWyp5wnMMjTwfMXgs6kR28-hj94iZhcydOS_FmuXoNj3TTuRa2oAfpVS-66X55BZaryZgjdkND0zar0AoW3WVv_cA">
                <img class="h-8 object-contain"
                    data-alt="minimalist corporate logo for a training accreditation body with abstract symbol"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBLvLBmCy6gaXEy23Qx8e_h3iO_pzWvbBE8-XgZ0yre9iZKQupx3Cs2owBybOa1jSPuJV1SPDmo8y6f_2dan3O4vxzeS6AnVN6qW6npAuFo2yRqfsTF0DXqal1_7ii-4y53H5zBvAfMp5__ovCb41cDxDYoifEv38Ex3cjh5dgx8oyUMV2okC_0PNrG7SMXqKcBYV_h2-1IzcczQp13HiodvPFWAI5naLuT4aFI07K5GMJ50u5OIzyOA0xDgKdc2XujZ-yzi-vDCQ">
                <img class="h-10 object-contain"
                    data-alt="modern typographical logo for a certification board with bold lines"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAzwPcL0WQCuJnWJ93r4biVNzgbkgNtAaZOSVzuvo3wnFuI6EL2d71UXZ1xX6UtYO94f2h7pbfOSWwekkckUTXSH4AU8jUpES2P4-CFvVT-pnAqVZfRunV-ktUaj__WuODhJDW_Oi3N65jwl7RiTLoQdWtV9qniq_QtLICxYGFLqUDWgdnmawW5Uqaq4W3wxOHKJqYR3gMYZPM3ItN2NRW4G1MQgowWcAGNjRCEn48eFJUlm-aM38N9SYLVwyrUmMrEkJnx2oVDJg">
                <img class="h-8 object-contain"
                    data-alt="minimalist badge-style logo for an international education standards organization"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBRhqkSSlF6Dma735fkTGzVvUf4jSzcHmkDsTpx6bfNFh3eB9znFpN2VihZcgg-k9JcDyHNsoejrPyOX62dRoqvO35JTNnoCip12w6_KMyWwbvBmbPzkg1SWqH4FoPVWxzuuVDEKZq4WmHUucEFEnzIpiwrEu7GGJWcv9vqyQuyQ-FjsqfvUx_1wnM3JzHAXNd5CFLQC1LW3aSEdeDLuzP2xOx0EYaR2YxTEfHdmxAnAXxFGxYwhR8MWhQyLUdh7FpYUcztheFwWQ">
                <img class="h-8 object-contain" data-alt="sleek corporate mark for a global vocational training federation"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAUkoe46U7rth1ykPwClT02Hm_NQ77El09JBl897ygh-Lve3PLtbTDhZHeLrsgUX0z6ceHjvnTZ94zBJ8sHKvM8plzB_NsISYvAjBTvnjUm8tz_zIEYn97uNqhQjlmZ3VimvcwIAEWvJO-Pn1LUrDrjAU9gSGrW5-q-53Wmx9Eirfuu4Ur_4bWY6-MFZKZ-iTuHsZXqsxvSTbuVX7xHB7Qz3fcF7i9Tzixlq37BVAt1do5vJ0MB7JJodTqgMsaD6FhZzmSMcypxIQ">
            </div>
        </div>
    </section>

    <section class="py-12 bg-slate-50/50">
        <div class="max-w-7xl mx-auto px-5 md:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 md:mb-12 lg:mb-16 gap-2 lg:gap-6">
                <div class="max-w-2xl">
                    <h2 class="text-lg md:text-xl lg:text-2xl font-semibold text-slate-900 mb-4">World-Class Qualifications</h2>
                    <p class="text-sm sm:text-base  text-slate-600">Our programs are designed by industry experts to
                        provide practical, immediate value to your professional career.</p>
                </div>
                <a class="text-brand-600 font-semibold text-sm sm:text-base flex items-center gap-2 group border-b border-brand-600/0 hover:border-brand-600 transition-all"
                    href="/qualifications">
                    View All Qualifications
                    <span aria-hidden="true" class="text-base">→</span>
                </a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 md:gap-6 gap-4  mt-6 md:mt-8">
                @include('frontend.pages.partials.qualification-cards', ['courses' => $courses])
            </div>
        </div>
    </section>

    <section class="bg-gray-50 py-10 sm:py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-5 md:px-8">

            <!-- Heading -->
            <div class="text-center md:mb-8 mb-4">
                <h2 class="font-display font-bold text-lg md:text-2xl lg:text-3xl text-primary mb-3">Our Student Stories
                </h2>
                <p class="text-on-surface-variant max-w-xl mx-auto text-sm md:text-base">Hear from our students
                    about their journey and success stories.</p>
            </div>

            <!-- Reviews Data -->
            @php
                $reviews = [
                    [
                        'name' => 'Carly Bishop',
                        'designation' => 'Individual Support',
                        'image' => 'teacher__1.jpg',
                        'rating' => 4,
                        'text' =>
                            'I highly recommend them, I was hired before finishing my placement and love working in this industry...',
                    ],
                    [
                        'name' => 'Roslyn Brakes',
                        'designation' => 'Aged Care',
                        'image' => 'teacher__2.jpg',
                        'rating' => 4,
                        'text' => 'I completed my certificate IV in ageing support and have no complaints...',
                    ],
                    [
                        'name' => 'Jess Heffernan',
                        'designation' => 'Community Service',
                        'image' => 'teacher__3.jpg',
                        'rating' => 4,
                        'text' => 'Had a great experience with them. great place to study...',
                    ],
                    [
                        'name' => 'Md Abdul Mannan',
                        'designation' => 'Community Service',
                        'image' => 'teacher__4.jpg',
                        'rating' => 4,
                        'text' => 'Had a great experience with them. great place to study...',
                    ],
                ];
            @endphp

            <!-- Slider -->
            <div class="relative">
                <div class="swiper student-stories-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($reviews as $review)
                            <div class="swiper-slide h-auto">
                                <div
                                    class="bg-white rounded-md border border-slate-200 shadow-sm 
                      p-5 sm:p-6 lg:p-7 
                      flex flex-col h-full">

                                    <!-- Stars -->
                                    <div class="flex items-center gap-1 mb-4">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $review['rating'])
                                                <span class="text-teal-600 text-sm sm:text-xl">★</span>
                                            @else
                                                <span class="text-teal-600 text-sm sm:text-xl">☆</span>
                                            @endif
                                        @endfor
                                    </div>

                                    <!-- Text -->
                                    <p
                                        class="text-gray-600 text-sm sm:text-base leading-relaxed mb-6 flex-grow line-clamp-2">
                                        {{ $review['text'] }}
                                    </p>

                                    <!-- Author -->
                                    <div class="flex items-center justify-between mt-auto">

                                        <div class="flex items-center gap-3">
                                            <img src="{{ asset('frontend-img/' . $review['image']) }}"
                                                alt="{{ $review['name'] }}"
                                                class="w-10 h-10 sm:w-12 sm:h-12 rounded-full object-cover">

                                            <div>
                                                <h5
                                                    class="font-semibold text-gray-900 
                             text-sm sm:text-base">
                                                    {{ $review['name'] }}
                                                </h5>
                                                <span class="text-gray-500 text-xs sm:text-sm">
                                                    {{ $review['designation'] }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-8 md:py-16 lg:py-24 ca-bg-primary relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="max-w-7xl mx-auto px-5 md:px-8 relative z-10 text-center">
            <h2 class="lg:text-4xl md:text-3xl sm:text-2xl text-xl text-white mb-6">Ready to Take the Next Step?</h2>
            <p class="md:text-lg sm:text-base text-sm text-slate-400 max-w-2xl mx-auto mb-10">Join hundreds of professionals who
                have advanced their careers through our accredited programs.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <button
                    class="bg-teal-600 text-white px-10 py-4 font-label-bold text-lg hover:bg-teal-700 rounded-full transition-colors">
                    Apply for Enrollment
                </button>

                <a href="{{ route('download.brochure') }}"
                    class="bg-transparent text-white border border-slate-600 px-10 py-4 font-label-bold text-lg hover:bg-white/5 rounded-full transition-colors flex items-center justify-center gap-2">
                    Download Brochure
                </a>
            </div>
        </div>
    </section>
@endsection
