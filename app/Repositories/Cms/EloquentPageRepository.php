<?php

namespace App\Repositories\Cms;

use App\Models\Cms\Page;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentPageRepository implements PageRepositoryInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Page::query()
            ->orderByDesc('id')
            ->paginate($perPage);
    }

    public function findById(int $id): Page
    {
        return Page::query()->findOrFail($id);
    }

    public function findBySlug(string $slug): ?Page
    {
        return Page::query()->where('slug', $slug)->first();
    }

    public function create(array $data): Page
    {
        return Page::query()->create($data);
    }

    public function update(Page $page, array $data): Page
    {
        $page->fill($data);
        $page->save();

        return $page;
    }

    public function delete(Page $page): void
    {
        $page->delete();
    }
}

