<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Cms\Section;
use App\Repositories\Cms\PageRepositoryInterface;
use App\Services\Cms\CmsPageCache;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PublicPageController extends Controller
{
    public function __construct(
        private readonly PageRepositoryInterface $pages,
        private readonly CmsPageCache $cache
    ) {}

    public function show(string $slug): Response
    {
        $page = $this->pages->findBySlug($slug);

        if (!$page || $page->status !== 'published') {
            abort(404);
        }

        if (request()->boolean('lazy')) {
            $page->load('sections');

            return response()->view('frontend.pages.cms.page', [
                'title' => $page->title,
                'metaTitle' => $page->meta_title ?: $page->title,
                'metaDescription' => $page->meta_description,
                'page' => $page,
                'lazySections' => true,
                'sectionsEndpoint' => url('/_cms/pages/' . $page->slug . '/sections'),
            ]);
        }

        $html = $this->cache->rememberPageHtml($slug, 3600, function () use ($slug) {
            $page = $this->pages->findBySlug($slug);
            if (!$page || $page->status !== 'published') {
                return '';
            }

            $page->load('sections');

            return view('frontend.pages.cms.page', [
                'title' => $page->title,
                'metaTitle' => $page->meta_title ?: $page->title,
                'metaDescription' => $page->meta_description,
                'page' => $page,
            ])->render();
        });

        if ($html === '') {
            abort(404);
        }

        return response($html);
    }

    public function sections(string $slug): JsonResponse
    {
        $page = $this->pages->findBySlug($slug);

        if (!$page || $page->status !== 'published') {
            abort(404);
        }

        $page->load('sections');

        return response()->json([
            'sections' => $page->sections->map(function (Section $section) {
                return [
                    'id' => $section->id,
                    'type' => $section->type,
                    'css_classes' => $section->css_classes,
                    'content' => $section->content,
                    'sort_order' => $section->sort_order,
                ];
            })->values(),
        ]);
    }
}

