@extends('frontend.layouts.app')

@section('content')
    @if (!empty($lazySections))
        <div id="cms-sections" data-endpoint="{{ $sectionsEndpoint }}"></div>
    @else
        @foreach ($page->sections as $section)
            <section class="{{ $section->css_classes }}">
                {!! $section->content !!}
            </section>
        @endforeach
    @endif
@endsection

@if (!empty($lazySections))
    @push('scripts')
        <script>
            (function () {
                const container = document.getElementById('cms-sections');
                if (!container) return;

                const endpoint = container.getAttribute('data-endpoint');
                if (!endpoint) return;

                fetch(endpoint, { headers: { 'Accept': 'application/json' } })
                    .then(r => r.json())
                    .then(data => {
                        const sections = Array.isArray(data.sections) ? data.sections : [];
                        container.innerHTML = sections.map(s => {
                            const cls = s.css_classes ? String(s.css_classes) : '';
                            const html = s.content ? String(s.content) : '';
                            return `<section class="${cls}">${html}</section>`;
                        }).join('');
                    });
            })();
        </script>
    @endpush
@endif
