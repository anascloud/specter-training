<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cms\PageStoreRequest;
use App\Http\Requests\Admin\Cms\PageUpdateRequest;
use App\Models\Cms\Page;
use App\Repositories\Cms\PageRepositoryInterface;
use App\Services\Cms\PageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PageController extends Controller
{
    public function __construct(
        private readonly PageRepositoryInterface $pages,
        private readonly PageService $service
    ) {}

    public function index(): View
    {
        return view('backend.pages.cms.pages.index', [
            'title' => 'Pages',
            'pages' => $this->pages->paginate(15),
        ]);
    }

    public function create(): View
    {
        return view('backend.pages.cms.pages.create', [
            'title' => 'Create Page',
            'statuses' => ['draft', 'published'],
        ]);
    }

    public function store(PageStoreRequest $request): RedirectResponse
    {
        $page = $this->service->createPage($request->validated());

        return redirect()
            ->route('admin.cms.pages.edit', $page)
            ->with('success', 'Page created.');
    }

    public function edit(Page $page): View
    {
        $page->load('sections');

        return view('backend.pages.cms.pages.edit', [
            'title' => 'Edit Page',
            'page' => $page,
            'statuses' => ['draft', 'published'],
        ]);
    }

    public function update(PageUpdateRequest $request, Page $page): RedirectResponse
    {
        $this->service->updatePage($page, $request->validated());

        return back()->with('success', 'Page updated.');
    }

    public function destroy(Page $page): RedirectResponse
    {
        $this->service->deletePage($page);

        return redirect()
            ->route('admin.cms.pages.index')
            ->with('success', 'Page deleted.');
    }
}

