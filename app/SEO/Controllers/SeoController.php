<?php

namespace App\SEO\Controllers;

use App\Http\Controllers\Controller;
use App\SEO\Models\SeoMeta;
use App\SEO\Requests\StoreSeoRequest;
use App\SEO\Requests\UpdateSeoRequest;
use App\Traits\CourseTrait;
use App\Traits\RouteDiscoveryTrait;
use Illuminate\Support\Facades\Storage;

class SeoController extends Controller
{
    use CourseTrait, RouteDiscoveryTrait;
    public function index()
    {
        $items = SeoMeta::latest()->paginate(20);

        return view('backend.pages.seo.index', compact('items'));
    }

    public function create()
    {
        $routes = $this->getRouteList();

        return view('backend.pages.seo.create', compact('routes'));
    }

    public function store(StoreSeoRequest $request)
    {
        $data = $request->validated();
        $data['path'] = $data['type'];
        unset($data['type']);

        if ($request->hasFile('og_image')) {

            $data['og_image'] = $request
                ->file('og_image')
                ->store('seo/og-images', 'public');
        }
        if ($request->hasFile('twitter_image')) {

            $data['twitter_image'] = $request
                ->file('twitter_image')
                ->store('seo/twitter-images', 'public');
        }

        $data['header_scripts'] = array_values(
            array_filter($data['header_scripts'] ?? [])
        );

        $data['footer_scripts'] = array_values(
            array_filter($data['footer_scripts'] ?? [])
        );

        SeoMeta::create($data);

        return redirect()
            ->route('admin.seo.index')
            ->with('success', 'SEO data created successfully.');
    }

    public function edit(SeoMeta $seo)
    {
        $routes = $this->getRouteList();

        return view('backend.pages.seo.edit', compact(
            'seo',
            'routes'
        ));
    }

  public function update(UpdateSeoRequest $request, SeoMeta $seo)
{
    $data = $request->validated();

     if ($request->hasFile('og_image')) {

        if ($seo->og_image) {
            Storage::disk('public')->delete($seo->og_image);
        }

        $data['og_image'] = $request->file('og_image')
            ->store('seo/og-images', 'public');

    } else {
        $data['og_image'] = $seo->og_image;
    }

 
    if ($request->hasFile('twitter_image')) {

        if ($seo->twitter_image) {
            Storage::disk('public')->delete($seo->twitter_image);
        }

        $data['twitter_image'] = $request->file('twitter_image')
            ->store('seo/twitter-images', 'public');

    } else {
        $data['twitter_image'] = $seo->twitter_image;
    }

  
    if ($request->has('header_scripts')) {

        $data['header_scripts'] = array_values(
            array_filter($request->input('header_scripts', []))
        );

    } else {
        $data['header_scripts'] = $seo->header_scripts ?? [];
    }

    if ($request->has('footer_scripts')) {

        $data['footer_scripts'] = array_values(
            array_filter($request->input('footer_scripts', []))
        );

    } else {
        $data['footer_scripts'] = $seo->footer_scripts ?? [];
    }

    $seo->update($data);

    return redirect()
        ->route('admin.seo.index')
        ->with('success', 'SEO data updated successfully.');
}

    public function destroy(SeoMeta $seo)
    {
        if ($seo->og_image) {
            Storage::disk('public')->delete($seo->og_image);
        }

        if ($seo->twitter_image) {
            Storage::disk('public')->delete($seo->twitter_image);
        }

        $seo->delete();

        return redirect()
            ->back()
            ->with('success', 'SEO data deleted successfully.');
    }
}
