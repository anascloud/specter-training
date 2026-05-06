<?php

namespace App\SEO\Controllers;

use App\Http\Controllers\Controller;
use App\SEO\Models\SeoMeta;
use App\SEO\Requests\StoreSeoRequest;
use App\SEO\Requests\UpdateSeoRequest;
use App\Traits\RouteDiscoveryTrait;

class SeoController extends Controller
{
    use RouteDiscoveryTrait;
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
        SeoMeta::create($request->validated());

        return redirect()
            ->route('seo.index')
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
            ->route('seo.index')
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
