<?php

namespace App\Repositories\Cms;

use App\Models\Cms\Page;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PageRepositoryInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator;

    public function findById(int $id): Page;

    public function findBySlug(string $slug): ?Page;

    public function create(array $data): Page;

    public function update(Page $page, array $data): Page;

    public function delete(Page $page): void;
}

