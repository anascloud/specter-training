<?php

namespace App\Repositories\Cms;

use App\Models\Cms\Page;
use App\Models\Cms\Section;
use Illuminate\Database\Eloquent\Collection;

class EloquentSectionRepository implements SectionRepositoryInterface
{
    public function listForPage(Page $page): Collection
    {
        return $page->sections()->get();
    }

    public function findById(int $id): Section
    {
        return Section::query()->findOrFail($id);
    }

    public function create(array $data): Section
    {
        return Section::query()->create($data);
    }

    public function update(Section $section, array $data): Section
    {
        $section->fill($data);
        $section->save();

        return $section;
    }

    public function delete(Section $section): void
    {
        $section->delete();
    }

    public function nextSortOrderForPage(Page $page): int
    {
        $max = Section::query()
            ->where('page_id', $page->id)
            ->max('sort_order');

        return is_null($max) ? 0 : ((int) $max + 1);
    }

    public function reorder(Page $page, array $orderedSectionIds): void
    {
        $ids = array_values(array_unique(array_map('intval', $orderedSectionIds)));

        foreach ($ids as $index => $id) {
            Section::query()
                ->where('page_id', $page->id)
                ->where('id', $id)
                ->update(['sort_order' => $index]);
        }
    }
}
