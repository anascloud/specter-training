<?php

namespace App\Repositories\Cms;

use App\Models\Cms\Page;
use App\Models\Cms\Section;
use Illuminate\Database\Eloquent\Collection;

interface SectionRepositoryInterface
{
    public function listForPage(Page $page): Collection;

    public function findById(int $id): Section;

    public function create(array $data): Section;

    public function update(Section $section, array $data): Section;

    public function delete(Section $section): void;

    public function nextSortOrderForPage(Page $page): int;

    public function reorder(Page $page, array $orderedSectionIds): void;
}
