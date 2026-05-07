@php
    use App\SEO\Models\SeoMeta;
    $path = request()->route()->getName();
    $uri = request()->getRequestUri();
    $seo = SeoMeta::query()
        ->whereIn('path', [$path, $uri])
        ->where('is_active', true)
        ->first();
@endphp


<title>{{ $seo->meta_title ?? config('app.name') }}</title>

<meta name="description" content="{{ $seo->meta_description ?? 'Specter - Your Ultimate Solution' }}">
<meta name="keywords" content="{{ $seo->meta_keywords ?? ' specter, ultimate, solution,student,study,education ' }}">
<meta name="robots" content="{{ $seo->robots ?? 'index,follow' }}">

<link rel="canonical" href="{{ $seo->canonical_url ?? url()->current() }}">

<!-- Open Graph -->
<meta property="og:title" content="{{ $seo->og_title ?? ($seo->meta_title ?? config('app.name')) }}">
<meta property="og:description"
    content="{{ $seo->og_description ?? ($seo->meta_description ?? 'Specter - Your Ultimate Solution') }}">
<meta property="og:image"
    content="{{ $seo?->og_image ? asset('storage/' . $seo->og_image) : asset('images/logo.jpg') }}">

<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="{{ $seo->og_type ?? 'website' }}">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seo->twitter_title ?? ($seo->meta_title ?? config('app.name')) }}">
<meta name="twitter:description"
    content="{{ $seo->twitter_description ?? ($seo->meta_description ?? 'Specter - Your Ultimate Solution') }}">
<meta property="og:image"
      content="{{ $seo?->twitter_image
            ? asset('storage/'.$seo->twitter_image)
            : asset('images/logo.jpg') }}">


<!-- scripts header and footer -->
@if (!empty($seo?->header_scripts))

    @foreach ($seo->header_scripts as $script)
        {!! $script !!}
    @endforeach

@endif

@if (!empty($seo?->footer_scripts))

    @foreach ($seo->footer_scripts as $script)
        {!! $script !!}
    @endforeach

@endif

<!-- Schema -->
@if ($seo?->schema_markup)
    {!! $seo->schema_markup !!}
@endif
