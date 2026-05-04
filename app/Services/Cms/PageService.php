<?php

namespace App\Services\Cms;

use App\Models\Cms\Page;
use App\Models\Cms\Section;
use App\Repositories\Cms\PageRepositoryInterface;
use App\Repositories\Cms\SectionRepositoryInterface;
use Illuminate\Support\Str;

class PageService
{
    public function __construct(
        private readonly PageRepositoryInterface $pages,
        private readonly SectionRepositoryInterface $sections,
        private readonly HtmlSanitizer $sanitizer,
        private readonly SeoAnalyzer $seoAnalyzer,
        private readonly CmsPageCache $cache
    ) {}

    public function createPage(array $data): Page
    {
        $data['slug'] = $this->normalizeSlug($data['slug'] ?? '');
        $page = $this->pages->create($data);

        $this->recalculateSeo($page);

        return $page;
    }

    public function updatePage(Page $page, array $data): Page
    {
        if (array_key_exists('slug', $data)) {
            $data['slug'] = $this->normalizeSlug((string) $data['slug']);
        }

        $oldSlug = $page->slug;
        $page = $this->pages->update($page, $data);

        if ($oldSlug !== $page->slug) {
            $this->cache->forgetPage($oldSlug);
        }
        $this->cache->forgetPage($page->slug);

        $this->recalculateSeo($page);

        return $page;
    }

    public function deletePage(Page $page): void
    {
        $slug = $page->slug;
        $this->pages->delete($page);
        $this->cache->forgetPage($slug);
    }

    public function createSection(Page $page, array $data): Section
    {
        $data['page_id'] = $page->id;
        $data['sort_order'] = $this->sections->nextSortOrderForPage($page);
        $data['content'] = $this->sanitizer->sanitize($data['content'] ?? '');

        $section = $this->sections->create($data);
        $this->cache->forgetPage($page->slug);
        $this->recalculateSeo($page);

        return $section;
    }

    public function updateSection(Section $section, array $data): Section
    {
        if (array_key_exists('content', $data)) {
            $data['content'] = $this->sanitizer->sanitize($data['content']);
        }

        $section = $this->sections->update($section, $data);
        $page = $section->page()->firstOrFail();

        $this->cache->forgetPage($page->slug);
        $this->recalculateSeo($page);

        return $section;
    }

    public function deleteSection(Section $section): void
    {
        $page = $section->page()->firstOrFail();
        $this->sections->delete($section);

        $this->cache->forgetPage($page->slug);
        $this->recalculateSeo($page);
    }

    public function reorderSections(Page $page, array $orderedSectionIds): void
    {
        $this->sections->reorder($page, $orderedSectionIds);
        $this->cache->forgetPage($page->slug);
        $this->recalculateSeo($page);
    }

    private function recalculateSeo(Page $page): void
    {
        $html = $page->sections()->pluck('content')->implode("\n");
        $report = $this->seoAnalyzer->analyze($page, $html);

        $page->seo_score = (int) $report['score'];
        $page->seo_report = $report['checks'];
        $page->save();
    }

    private function normalizeSlug(string $slug): string
    {
        $slug = trim($slug);

        if ($slug === '') {
            return '';
        }

        return Str::slug($slug);
    }
}
