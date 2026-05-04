@extends('frontend.layouts.app')

@section('content')
    <section class="hero-gradient overflow-hidden -mt-10">
        <div class="max-w-7xl mx-auto px-8 py-20 lg:py-32 grid lg:grid-cols-2 gap-16 items-center">
            <div class="space-y-8">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-white border border-slate-200 rounded-full">
                    <span class="w-2 h-2 rounded-full bg-teal-600"></span>
                    <span class="font-label-bold text-caption uppercase tracking-wider text-slate-600">Nationally Accredited
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
                        class="bg-teal-600 text-white rounded-full px-8 py-4 font-label-bold text-md shadow-lg shadow-teal-900/20 active:scale-95 transition-all">
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
                    <span class="text-caption font-label-bold text-slate-500">Joined by 2,000+ Students</span>
                </div>
            </div>
            <!-- Conversion Form -->
            <div class="bg-white p-8 lg:p-10 border border-slate-200 shadow-xl relative">
                <div class="absolute top-0 right-0 w-32 h-32 bg-teal-600/20 -z-10 translate-x-8 -translate-y-8">
                </div>
                <div class="space-y-6">
                    <h2 class="font-headline-md text-headline-md text-slate-900">Apply for Admission</h2>
                    <p class="text-slate-500 font-body-md">Fill out the form below and an education consultant will contact
                        you within 24 hours.</p>
                    <form class="space-y-4">
                        <div>
                            <label class="block font-label-bold text-slate-700 mb-2">Full Name</label>
                            <input
                                class="w-full border-slate-200 focus:border-on-primary-fixed focus:ring-on-primary-fixed p-3 font-body-md transition-colors"
                                placeholder="John Doe" type="text">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block font-label-bold text-slate-700 mb-2">Email Address</label>
                                <input
                                    class="w-full border-slate-200 focus:border-on-primary-fixed focus:ring-on-primary-fixed p-3 font-body-md transition-colors"
                                    placeholder="john@example.com" type="email">
                            </div>
                            <div>
                                <label class="block font-label-bold text-slate-700 mb-2">Phone Number</label>
                                <input
                                    class="w-full border-slate-200 focus:border-on-primary-fixed focus:ring-on-primary-fixed p-3 font-body-md transition-colors"
                                    placeholder="+1 (555) 000-0000" type="tel">
                            </div>
                        </div>
                        <div>
                            <label class="block font-label-bold text-slate-700 mb-2">Interested Sector</label>
                            <select
                                class="w-full border-slate-200 focus:border-on-primary-fixed focus:ring-on-primary-fixed p-3 font-body-md transition-colors">
                                <option>Hospitality Management</option>
                                <option>Retail Operations</option>
                                <option>Advanced Manufacturing</option>
                                <option>Business Administration</option>
                            </select>
                        </div>
                        <button
                            class="w-full bg-teal-600 text-white rounded py-4 font-label-bold text-lg active:scale-95 transition-transform mt-4"
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
@endsection
