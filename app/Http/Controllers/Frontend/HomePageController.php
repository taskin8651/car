<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HomeHeroSlide;
use App\Models\Testimonial;

class HomePageController extends Controller
{
    public function index()
    {
        $heroSlides = HomeHeroSlide::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->latest()
            ->get();

        $testimonials = Testimonial::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('frontend.index', compact('heroSlides', 'testimonials'));
    }
}
