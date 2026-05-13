<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutCompany;
use Illuminate\Http\Request;

class AboutCompanyController extends Controller
{
    public function index()
    {
        $aboutCompany = AboutCompany::query()->first();

        if (!$aboutCompany) {
            $aboutCompany = AboutCompany::create([
                'tag_icon' => 'bi bi-building-check',
                'tag_title' => 'Company Introduction',
                'image_alt' => 'Premium car rental business',
                'badge_icon' => 'bi bi-gem',
                'badge_title' => 'Premium Experience',
                'title' => 'Luxury Car Rental Service Built For Memorable Celebrations',
                'description_one' => 'We provide premium cars for weddings, receptions, pre-wedding shoots, engagements, family events and VIP guest transport. Our goal is to make every special moment feel elegant, comfortable and unforgettable.',
                'description_two' => 'From car selection to booking support and event coordination, our team focuses on a smooth experience with clean vehicles, punctual service and professional driver support.',
                'features' => [
                    'Luxury car collection',
                    'Driver included',
                    'Decoration support',
                    'Fast booking enquiry',
                ],
                'status' => 1,
                'sort_order' => 0,
            ]);
        }

        return view('admin.about-companies.index', compact('aboutCompany'));
    }

    public function update(Request $request)
    {
        $aboutCompany = AboutCompany::query()->first();

        if (!$aboutCompany) {
            $aboutCompany = new AboutCompany();
        }

        $request->validate([
            'tag_icon' => 'nullable|string|max:255',
            'tag_title' => 'nullable|string|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'image_alt' => 'nullable|string|max:255',

            'badge_icon' => 'nullable|string|max:255',
            'badge_title' => 'nullable|string|max:255',

            'title' => 'required|string|max:255',
            'description_one' => 'nullable|string',
            'description_two' => 'nullable|string',

            'features' => 'nullable|array',
            'features.*' => 'nullable|string|max:255',

            'status' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $aboutCompany->fill([
            'tag_icon' => $request->tag_icon,
            'tag_title' => $request->tag_title,
            'image_alt' => $request->image_alt,
            'badge_icon' => $request->badge_icon,
            'badge_title' => $request->badge_title,
            'title' => $request->title,
            'description_one' => $request->description_one,
            'description_two' => $request->description_two,
            'features' => collect($request->features ?? [])->filter()->values()->toArray(),
            'status' => $request->has('status') ? 1 : 0,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        $aboutCompany->save();

        if ($request->hasFile('image')) {
            $aboutCompany
                ->addMediaFromRequest('image')
                ->toMediaCollection('about_company_image');
        }

        return redirect()
            ->route('admin.about-companies.index')
            ->with('success', 'Company intro section updated successfully.');
    }
}