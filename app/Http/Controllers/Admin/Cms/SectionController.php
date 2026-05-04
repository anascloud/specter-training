<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cms\SectionStoreRequest;
use App\Http\Requests\Admin\Cms\SectionUpdateRequest;
use App\Models\Cms\Page;
use App\Models\Cms\Section;
use App\Repositories\Cms\SectionRepositoryInterface;
use App\Services\Cms\HtmlSanitizer;
use App\Services\Cms\PageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SectionController extends Controller
{
    public function __construct(
        private readonly SectionRepositoryInterface $sections,
        private readonly PageService $service,
        private readonly HtmlSanitizer $sanitizer
    ) {}

    public function index(Page $page): View
    {
        $page->load('sections');

        return view('backend.pages.cms.sections.index', [
            'title' => 'Sections',
            'page' => $page,
        ]);
    }

    public function create(Page $page): View
    {
        return view('backend.pages.cms.sections.create', [
            'title' => 'Add Section',
            'page' => $page,
            'types' => $this->types(),
        ]);
    }

    public function store(SectionStoreRequest $request, Page $page): RedirectResponse
    {
        $data = $request->validated();
        if (!empty($data['content_json'])) {
            $decoded = json_decode((string) $data['content_json'], true);
            $data['content_json'] = is_array($decoded) ? $decoded : null;
        } else {
            $data['content_json'] = null;
        }

        $this->service->createSection($page, $data);

        return redirect()
            ->route('admin.cms.pages.sections.index', $page)
            ->with('success', 'Section added.');
    }

    public function edit(Page $page, Section $section): View
    {
        abort_unless($section->page_id === $page->id, 404);

        return view('backend.pages.cms.sections.edit', [
            'title' => 'Edit Section',
            'page' => $page,
            'section' => $section,
            'types' => $this->types(),
        ]);
    }

    public function update(SectionUpdateRequest $request, Page $page, Section $section): RedirectResponse
    {
        abort_unless($section->page_id === $page->id, 404);

        $data = $request->validated();
        if (!empty($data['content_json'])) {
            $decoded = json_decode((string) $data['content_json'], true);
            $data['content_json'] = is_array($decoded) ? $decoded : null;
        } else {
            $data['content_json'] = null;
        }

        $this->service->updateSection($section, $data);

        return back()->with('success', 'Section updated.');
    }

    public function destroy(Page $page, Section $section): RedirectResponse
    {
        abort_unless($section->page_id === $page->id, 404);

        $this->service->deleteSection($section);

        return redirect()
            ->route('admin.cms.pages.sections.index', $page)
            ->with('success', 'Section deleted.');
    }

    public function preview(Request $request): JsonResponse
    {
        $html = $this->sanitizer->sanitize($request->string('content')->toString());

        return response()->json([
            'html' => $html,
        ]);
    }

    public function reorder(Request $request, Page $page): RedirectResponse
    {
        $ids = $request->input('section_ids', []);
        $this->service->reorderSections($page, is_array($ids) ? $ids : []);

        return back()->with('success', 'Section order updated.');
    }

    private function types(): array
    {
        return [
            'hero' => 'Hero',
            'feature' => 'Feature',
            'cta' => 'CTA',
            'content' => 'Content',
            'custom' => 'Custom',
        ];
    }
}
