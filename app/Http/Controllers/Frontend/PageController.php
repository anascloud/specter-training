<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\SectionRepositoryInterface;

class PageController extends Controller
{
    protected $sectionRepo;

    public function __construct(SectionRepositoryInterface $sectionRepo)
    {
        $this->sectionRepo = $sectionRepo;
    }

    public function home()
    {
        $about = $this->sectionRepo->getBySlug('about');

        return view('home', compact('about'));
    }
}
