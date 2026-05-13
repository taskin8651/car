<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeHeroSlide;
use Illuminate\Http\Request;

class HomeHeroSlideController extends Controller
{
    public function index()
    {
        $homeHeroSlides = HomeHeroSlide::query()
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.home-hero-slides.index', compact('homeHeroSlides'));
    }

    public function create()
    {
        return view('admin.home-hero-slides.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;
        $data['trust_items'] = $this->trustItems($request);

        $homeHeroSlide = HomeHeroSlide::create($data);
        $this->storeImages($request, $homeHeroSlide);

        return redirect()
            ->route('admin.home-hero-slides.index')
            ->with('success', 'Hero slide created successfully.');
    }

    public function show(HomeHeroSlide $homeHeroSlide)
    {
        return view('admin.home-hero-slides.show', compact('homeHeroSlide'));
    }

    public function edit(HomeHeroSlide $homeHeroSlide)
    {
        return view('admin.home-hero-slides.edit', compact('homeHeroSlide'));
    }

    public function update(Request $request, HomeHeroSlide $homeHeroSlide)
    {
        $data = $this->validatedData($request);
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;
        $data['trust_items'] = $this->trustItems($request);

        $homeHeroSlide->update($data);
        $this->storeImages($request, $homeHeroSlide);

        return redirect()
            ->route('admin.home-hero-slides.index')
            ->with('success', 'Hero slide updated successfully.');
    }

    public function destroy(HomeHeroSlide $homeHeroSlide)
    {
        $homeHeroSlide->clearMediaCollection('hero_background');
        $homeHeroSlide->clearMediaCollection('hero_showcase');
        $homeHeroSlide->delete();

        return redirect()
            ->route('admin.home-hero-slides.index')
            ->with('success', 'Hero slide deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'tag_icon' => 'nullable|string|max:255',
            'tag_title' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'title_highlight' => 'nullable|string|max:255',
            'description' => 'required|string',
            'background_image_url' => 'nullable|string',
            'showcase_image_url' => 'nullable|string',
            'image_alt' => 'nullable|string|max:255',
            'badge_icon' => 'nullable|string|max:255',
            'badge_title' => 'nullable|string|max:255',
            'primary_button_text' => 'nullable|string|max:255',
            'primary_button_url' => 'nullable|string|max:255',
            'primary_button_icon' => 'nullable|string|max:255',
            'secondary_button_text' => 'nullable|string|max:255',
            'secondary_button_url' => 'nullable|string|max:255',
            'secondary_button_icon' => 'nullable|string|max:255',
            'trust_numbers' => 'nullable|array',
            'trust_numbers.*' => 'nullable|string|max:255',
            'trust_labels' => 'nullable|array',
            'trust_labels.*' => 'nullable|string|max:255',
            'background_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'showcase_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);
    }

    private function trustItems(Request $request): array
    {
        $numbers = $request->input('trust_numbers', []);
        $labels = $request->input('trust_labels', []);
        $items = [];

        foreach ($numbers as $index => $number) {
            $label = $labels[$index] ?? null;
            if ($number || $label) {
                $items[] = [
                    'number' => $number,
                    'label' => $label,
                ];
            }
        }

        return array_slice($items, 0, 3);
    }

    private function storeImages(Request $request, HomeHeroSlide $homeHeroSlide): void
    {
        if ($request->hasFile('background_image')) {
            $homeHeroSlide->addMediaFromRequest('background_image')->toMediaCollection('hero_background');
        }

        if ($request->hasFile('showcase_image')) {
            $homeHeroSlide->addMediaFromRequest('showcase_image')->toMediaCollection('hero_showcase');
        }
    }
}
