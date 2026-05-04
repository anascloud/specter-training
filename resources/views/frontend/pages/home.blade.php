@extends('frontend.layouts.app')

@section('content')
    <section class="hero-gradient overflow-hidden -mt-10">
        <div class="max-w-7xl mx-auto px-8 py-20 lg:py-32 grid lg:grid-cols-2 gap-16 items-center">
            <div class="space-y-8">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-white border border-slate-200 rounded-full">
                    <span class="w-2 h-2 rounded-full bg-teal-600"></span>
                    <span class="font-semibold text-caption uppercase tracking-wider text-slate-600">Nationally Accredited
                        Training</span>
                </div>
                <h1 class="font-display-xl text-display-xl text-slate-900 leading-tight">
                    Elevate Your Career with <span class="text-teal-600">Industry-Leading</span> Qualifications.
                </h1>
                <p class="font-body-lg text-body-lg text-slate-600 max-w-xl">
                    Gain the skills and recognition you need to excel in today's competitive job market through our
                    specialized professional development programs.
                </p>
                <div class="flex items-center gap-4">
                    <button
                        class="bg-teal-600 text-white rounded-full px-8 py-4 font-semibold text-md shadow-lg shadow-teal-900/20 active:scale-95 transition-all">
                        Explore All Courses
                    </button>
                    <div class="flex -space-x-3">
                        <img class="w-10 h-10 rounded-full border-2 border-white object-cover"
                            data-alt="close-up portrait of a professional woman smiling in a bright office environment"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDG-4z1G68oQl-iGXiNYqGO3Yk26VB5WfqeAMhffyIz4YQFTWmEIRvh06FjhfKw3r6n3gmV3nkzfefju3jUrTyjy3jgvjtcnZErBZHYMlvy48LVfyZAfXNJrqkSuFDhEpeLfS3Inc19657BKI25hJJjOiRdJUzxKXuInZ8lPO43vrCfeDieCnmfHuxP6bmxZC_jvKlIvdITi0Q9aGU9DWairVcw-ujOtZNXzV-hfcO0oU3FXELuz9op6aKg4dEEfdhZMzTIRZSdzw">
                        <img class="w-10 h-10 rounded-full border-2 border-white object-cover"
                            data-alt="headshot of a smiling young businessman in a professional setting with soft lighting"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBHlSf5WdrLHKl1ibjPuvDYLhdzssgapeCNQhzWAs-kUqHFSJpiVBGvtG7j8XL9zRTqxkxsm5eZNrHk0_y_SMoivLMSxViylcwj354xgAvCS3EGR2_HeKsmM6lz5XLsBAWXQ8knFci4pOjpzL7MfwtK-aQjc9WSUKLg87qEWtn5PTMmN19a-QEgdZq1aPR4gLPb05gKc_CGXRrWAI0pPmHjF4J2BsBWrmE9BbDhEM_mQRTD20tbY3upRSFrc345oNFlDueGRCJEgw">
                        <img class="w-10 h-10 rounded-full border-2 border-white object-cover"
                            data-alt="professional portrait of a man in a modern office with natural daylight"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBDPaIO2t11KyDe5cCI6etrcRdFYBBLRBX1zVW4ks0o7i3MKBaxY6rwOrHrsg_9N2giyU4uWj1c_tBsI-jQtFbbaxvpjBzh9reL6y40xPCIuLyhVku4FyTP9ITLlWoeDWJ2cqau8NhpkuRQmhjlWrdvR9t-J1n3VxZ9KjXEfrsCWBReimdebq4E86ecGOQvXI7NHFC99EGTWKfCaBJrnoSgkaosNbe2nQO8ocumfzCk2dztTcSfoko8Y3sC3lPdhp0fph5VAXRDNg">
                    </div>
                    <span class="text-caption font-semibold text-slate-500">Joined by 2,000+ Students</span>
                </div>
            </div>
            <!-- Conversion Form -->
            <div class="bg-white p-8 lg:p-10 border border-slate-200 shadow-xl relative rounded-md">
                <div class="absolute top-0 right-0 w-32 h-32 bg-teal-600/20 -z-10 translate-x-8 -translate-y-8">
                </div>
                <div class="space-y-6">
                    <h2 class="font-headline-md text-headline-md text-slate-900">Apply for Admission</h2>
                    <p class="text-slate-500 font-body-md">Fill out the form below and an education consultant will contact
                        you within 24 hours.</p>
                    <form class="space-y-4">
                        <x-input-text label="Full Name" name="full_name" placeholder="John Doe" type="text" />
                        <div class="grid grid-cols-2 gap-4">
                            <x-input-text label="Email Address" name="email" placeholder="john@example.com"
                                type="email" />
                            <x-input-text label="Phone Number" name="phone" placeholder="+1 (555) 000-0000"
                                type="tel" />
                        </div>
                        <x-select-input name="type" label="Type" value="Hospitality Management" :options="[
                            'retail-operations' => 'Retail Operations',
                            'advanced-manufacturing' => 'Advanced Manufacturing',
                            'business-administration' => 'Business Administration',
                        ]" />
                        <button
                            class="w-full bg-teal-600 text-white rounded py-2.5 font-semibold text-base active:scale-95 transition-transform mt-4"
                            type="submit">
                            Submit Application
                        </button>
                        <p class="text-center text-caption text-slate-400">By submitting, you agree to our Privacy Policy.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white py-12 border-y border-slate-100">
        <div class="max-w-7xl mx-auto px-8">
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
        <div class="max-w-7xl mx-auto px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                <div class="max-w-2xl">
                    <h2 class="font-headline-lg text-headline-lg text-slate-900 mb-4">World-Class Qualifications</h2>
                    <p class="font-body-lg text-body-lg text-slate-600">Our programs are designed by industry experts to
                        provide practical, immediate value to your professional career.</p>
                </div>
                <a class="text-brand-600 font-semibold flex items-center gap-2 group border-b border-brand-600/0 hover:border-brand-600 transition-all"
                    href="#">
                    View All Qualifications
                    <span aria-hidden="true" class="text-base">→</span>
                </a>
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

    <section class="bg-gray-50 py-10 sm:py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Heading -->
            <div class="text-center md:mb-8 mb-4">
                <h2 class="font-display font-bold text-lg md:text-xl lg:text-2xl text-primary mb-3">Our Student Stories
                </h2>
                <p class="text-on-surface-variant max-w-xl mx-auto text-sm md:text-base lg:text-lg">Hear from our students
                    about their journey and success stories.</p>
            </div>

            <!-- Reviews Data -->
            @php
                $reviews = [
                    [
                        'name' => 'Carly Bishop',
                        'designation' => 'Individual Support',
                        'image' => 'author-1.png',
                        'rating' => 4,
                        'text' =>
                            'I highly recommend them, I was hired before finishing my placement and love working in this industry...',
                    ],
                    [
                        'name' => 'Roslyn Brakes',
                        'designation' => 'Aged Care',
                        'image' => 'author-2.png',
                        'rating' => 4,
                        'text' => 'I completed my certificate IV in ageing support and have no complaints...',
                    ],
                    [
                        'name' => 'Jess Heffernan',
                        'designation' => 'Community Service',
                        'image' => 'author-3.png',
                        'rating' => 4,
                        'text' => 'Had a great experience with them. great place to study...',
                    ],
                    [
                        'name' => 'Md Abdul Mannan',
                        'designation' => 'Community Service',
                        'image' => 'author-3.png',
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
                                        class="text-gray-600 text-sm sm:text-base leading-relaxed mb-6 flex-grow line-clamp-3">
                                        {{ $review['text'] }}
                                    </p>

                                    <!-- Author -->
                                    <div class="flex items-center justify-between mt-auto">

                                        <div class="flex items-center gap-3">
                                            <img src="{{ asset('frontend/images/testimonial/' . $review['image']) }}"
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

    <section class="py-24 ca-bg-primary relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="max-w-7xl mx-auto px-8 relative z-10 text-center">
            <h2 class="font-display-xl text-display-xl text-white mb-6">Ready to Take the Next Step?</h2>
            <p class="font-body-lg text-body-lg text-slate-400 max-w-2xl mx-auto mb-10">Join hundreds of professionals who
                have advanced their careers through our accredited programs.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <button
                    class="bg-teal-600 text-white px-10 py-4 font-label-bold text-lg hover:bg-teal-700 rounded-full transition-colors">
                    Apply for Enrollment
                </button>
                <button
                    class="bg-transparent text-white border border-slate-600 px-10 py-4 font-label-bold text-lg hover:bg-white/5 rounded-full transition-colors">
                    Download Brochure
                </button>
            </div>
        </div>
    </section>
@endsection
