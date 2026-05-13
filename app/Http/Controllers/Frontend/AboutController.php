<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutCompany;
use App\Models\AboutMission;
use App\Models\AboutSpecializationCard;

class AboutController extends Controller
{
    public function index()
    {
        $aboutCompany = AboutCompany::query()
            ->where('status', 1)
            ->orderBy('sort_order')
            ->first();

        $aboutMission = AboutMission::query()
            ->where('status', 1)
            ->orderBy('sort_order')
            ->first();

        $specializationCards = AboutSpecializationCard::query()
            ->where('status', 1)
            ->orderBy('sort_order')
            ->get();

        return view('frontend.about', compact(
            'aboutCompany',
            'aboutMission',
            'specializationCards'
        ));
    }
}