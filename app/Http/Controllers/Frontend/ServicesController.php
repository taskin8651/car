<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ServiceCard;
use App\Models\ServiceHighlight;
use App\Models\ServiceIntro;

class ServicesController extends Controller
{
    public function index()
    {
        $serviceIntro = ServiceIntro::query()
            ->where('status', 1)
            ->orderBy('sort_order')
            ->first();

        $serviceCards = ServiceCard::query()
            ->where('status', 1)
            ->orderBy('sort_order')
            ->get();

        $serviceHighlight = ServiceHighlight::query()
            ->where('status', 1)
            ->orderBy('sort_order')
            ->first();

        return view('frontend.services', compact(
            'serviceIntro',
            'serviceCards',
            'serviceHighlight'
        ));
    }
}
