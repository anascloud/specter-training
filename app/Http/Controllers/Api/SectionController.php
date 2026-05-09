<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\SectionRepositoryInterface;

class SectionController extends Controller
{
    protected $sectionRepo;

    public function __construct(SectionRepositoryInterface $sectionRepo)
    {
        $this->sectionRepo = $sectionRepo;
    }

    public function show($slug)
    {
        return response()->json(
            $this->sectionRepo->getBySlug($slug)
        );
    }
}
