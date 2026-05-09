<?php

namespace App\Repositories;

use App\Models\Section;
use Illuminate\Support\Facades\Cache;
use App\Traits\TransformBlocks;

class SectionRepository implements SectionRepositoryInterface
{
    use TransformBlocks; // 🔥 IMPORTANT

    public function getBySlug(string $slug): array
    {
        return Cache::remember("section_$slug", 3600, function () use ($slug) {

            $section = Section::where('slug', $slug)
                ->with('blocks')
                ->first();

            if (!$section) return [];

            return $this->transformBlocks($section->blocks);
        });
    }
}