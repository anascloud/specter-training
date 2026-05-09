<?php

namespace App\Services;

use App\Repositories\SectionRepositoryInterface;

class SectionService
{
    protected $repo;

    public function __construct(SectionRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function get(string $slug): array
    {
        return $this->repo->getBySlug($slug);
    }

    public function getMany(array $slugs): array
    {
        $result = [];

        foreach ($slugs as $slug) {
            $result[$slug] = $this->repo->getBySlug($slug);
        }

        return $result;
    }
}
