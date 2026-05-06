<?php

namespace App\SEO\Controllers;

use App\Http\Controllers\Controller;
use App\SEO\Models\SeoMeta;
use App\SEO\Requests\StoreSeoRequest;
use App\SEO\Requests\UpdateSeoRequest;
use App\Traits\CourseTrait;
use App\Traits\RouteDiscoveryTrait;

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
        $seo->update($request->validated());

        return redirect()
            ->route('admin.seo.index')
            ->with('success', 'SEO data updated successfully.');
    }

    public function destroy(SeoMeta $seo)
    {
        $seo->delete();

        return redirect()
            ->back()
            ->with('success', 'SEO data deleted successfully.');
    }
}
