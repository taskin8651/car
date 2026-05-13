<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceHighlight;
use Illuminate\Http\Request;

class ServiceHighlightController extends Controller
{
    public function index()
    {
        $serviceHighlight = ServiceHighlight::query()->first();

        if (!$serviceHighlight) {
            $serviceHighlight = ServiceHighlight::create([
                'tag_icon' => 'bi bi-shield-check',
                'tag_title' => 'Why Our Services',
                'image_alt' => 'Decorated wedding car service',
                'badge_icon' => 'bi bi-gem',
                'badge_title' => 'Premium Wedding Entry',
                'title' => 'Planned For Comfort, Timing & Premium Event Experience',
                'description' => 'Our team coordinates with customers based on event date, location, preferred car, decoration needs and pickup/drop requirements to make the experience smooth and professional.',
                'features' => [
                    'Clean and event-ready cars',
                    'Professional driver support',
                    'Wedding decoration on request',
                    'WhatsApp and call enquiry support',
                ],
                'status' => 1,
                'sort_order' => 0,
            ]);
        }

        return view('admin.service-highlights.index', compact('serviceHighlight'));
    }

    public function update(Request $request)
    {
        $serviceHighlight = ServiceHighlight::query()->first() ?: new ServiceHighlight();

        $request->validate([
            'tag_icon' => 'nullable|string|max:255',
            'tag_title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'image_alt' => 'nullable|string|max:255',
            'badge_icon' => 'nullable|string|max:255',
            'badge_title' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $serviceHighlight->fill([
            'tag_icon' => $request->tag_icon,
            'tag_title' => $request->tag_title,
            'image_alt' => $request->image_alt,
            'badge_icon' => $request->badge_icon,
            'badge_title' => $request->badge_title,
            'title' => $request->title,
            'description' => $request->description,
            'features' => collect($request->features ?? [])->filter()->values()->toArray(),
            'status' => $request->has('status') ? 1 : 0,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        $serviceHighlight->save();

        if ($request->hasFile('image')) {
            $serviceHighlight
                ->addMediaFromRequest('image')
                ->toMediaCollection('service_highlight_image');
        }

        return redirect()
            ->route('admin.service-highlights.index')
            ->with('success', 'Service highlight section updated successfully.');
    }
}
