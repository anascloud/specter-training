@php
    use App\SEO\Models\SeoMeta;
    $path = request()->route()->getName();
    $seo = SeoMeta::query()
            ->where('path', $path)
            ->where('is_active', true)
            ->first();

            dd($path, $seo);
@endphp


    <title>{{ $seo->meta_title ?? config('app.name') }}</title>

<meta name="description" content="{{ $seo->meta_description }}">
<meta name="keywords" content="{{ $seo->meta_keywords }}">
<meta name="robots" content="{{ $seo->robots ?? 'index,follow' }}">

<link rel="canonical" href="{{ $seo->canonical_url ?? url()->current() }}">

<!-- Open Graph -->
<meta property="og:title" content="{{ $seo->og_title ?? $seo->meta_title }}">
<meta property="og:description" content="{{ $seo->og_description ?? $seo->meta_description }}">
<meta property="og:image" content="{{ asset('storage/'.$seo->og_image) }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="{{ $seo->og_type ?? 'website' }}">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seo->twitter_title ?? $seo->meta_title }}">
<meta name="twitter:description" content="{{ $seo->twitter_description ?? $seo->meta_description }}">
<meta name="twitter:image" content="{{ asset('storage/'.$seo->twitter_image) }}">

<!-- Schema -->
@if($seo?->schema_markup)
{!! $seo->schema_markup !!}
@endif