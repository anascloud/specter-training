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
            <h3 class="font-semibold text-slate-900 md:text-base text-sm leading-tight mt-2">
                {{ $course['title'] }}</h3>
            <p class="text-slate-600 text-sm line-clamp-2">{{ $course['description'] }}</p>
            <div class="pt-4 border-t border-slate-100 flex items-center justify-between gap-6">
                <a href="{{ route('qualifications.details', $course['slug']) }}"
                    class="flex justify-center items-center w-1/2 bg-white border border-teal-600 text-teal-600 hover:bg-teal-600 hover:text-white rounded py-1.5 font-medium text-sm transition-transform">View
                    Details</a>
                <button
                    class="w-1/2 bg-teal-600 text-white rounded py-2 font-medium text-sm transition-transform"
                    type="button">
                    Enroll Now
                </button>
            </div>
        </div>
    </div>
@empty
    <div class="sm:col-span-2 lg:col-span-3 rounded-md border border-dashed border-slate-300 bg-white p-8 text-center">
        <p class="text-slate-600 font-medium">No courses found.</p>
        <p class="text-slate-400 text-sm mt-1">Try another search or filter.</p>
    </div>
@endforelse
