<?php

namespace App\Repositories;

interface SectionRepositoryInterface
{
    public function getBySlug(string $slug): array;
}