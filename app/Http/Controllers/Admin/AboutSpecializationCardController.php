<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSpecializationCard;
use Illuminate\Http\Request;

class AboutSpecializationCardController extends Controller
{
    public function index()
    {
        $aboutSpecializationCards = AboutSpecializationCard::query()
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.about-specialization-cards.index', compact('aboutSpecializationCards'));
    }

    public function create()
    {
        return view('admin.about-specialization-cards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'image_alt' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $aboutSpecializationCard = AboutSpecializationCard::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'image_alt' => $request->image_alt,
            'status' => $request->has('status') ? 1 : 0,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        if ($request->hasFile('image')) {
            $aboutSpecializationCard
                ->addMediaFromRequest('image')
                ->toMediaCollection('specialization_card_image');
        }

        return redirect()
            ->route('admin.about-specialization-cards.index')
            ->with('success', 'Specialization card created successfully.');
    }

    public function show(AboutSpecializationCard $aboutSpecializationCard)
    {
        return view('admin.about-specialization-cards.show', compact('aboutSpecializationCard'));
    }

    public function edit(AboutSpecializationCard $aboutSpecializationCard)
    {
        return view('admin.about-specialization-cards.edit', compact('aboutSpecializationCard'));
    }

    public function update(Request $request, AboutSpecializationCard $aboutSpecializationCard)
    {
        $request->validate([
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'image_alt' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $aboutSpecializationCard->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'image_alt' => $request->image_alt,
            'status' => $request->has('status') ? 1 : 0,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        if ($request->hasFile('image')) {
            $aboutSpecializationCard
                ->addMediaFromRequest('image')
                ->toMediaCollection('specialization_card_image');
        }

        return redirect()
            ->route('admin.about-specialization-cards.index')
            ->with('success', 'Specialization card updated successfully.');
    }

    public function destroy(AboutSpecializationCard $aboutSpecializationCard)
    {
        $aboutSpecializationCard->clearMediaCollection('specialization_card_image');
        $aboutSpecializationCard->delete();

        return redirect()
            ->route('admin.about-specialization-cards.index')
            ->with('success', 'Specialization card deleted successfully.');
    }
}