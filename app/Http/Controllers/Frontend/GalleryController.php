<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;

class GalleryController extends Controller
{
    public function index()
    {
        $galleryItems = GalleryItem::query()
            ->where('status', 1)
            ->orderBy('sort_order')
            ->get();

        $galleryCategories = $galleryItems
            ->pluck('category')
            ->filter()
            ->unique()
            ->values();

        return view('frontend.gallery', compact('galleryItems', 'galleryCategories'));
    }
}
