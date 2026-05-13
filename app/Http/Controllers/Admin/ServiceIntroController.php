<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceIntro;
use Illuminate\Http\Request;

class ServiceIntroController extends Controller
{
    public function index()
    {
        $serviceIntro = ServiceIntro::query()->first();

        if (!$serviceIntro) {
            $serviceIntro = ServiceIntro::create([
                'tag_icon' => 'bi bi-info-circle',
                'tag_title' => 'What We Offer',
                'title' => 'Luxury Car Services Designed For Grand Celebrations',
                'description' => 'From royal wedding entries to VIP guest pickup, our services are planned to make your event smooth, stylish and memorable. Choose the right car, share your event details and our team will help with availability, pricing and service coordination.',
                'pills' => [
                    'Driver Included',
                    'Decoration Available',
                    'Wedding/Event Ready',
                    'Quick Enquiry Support',
                ],
                'status' => 1,
                'sort_order' => 0,
            ]);
        }

        return view('admin.service-intros.index', compact('serviceIntro'));
    }

    public function update(Request $request)
    {
        $serviceIntro = ServiceIntro::query()->first() ?: new ServiceIntro();

        $request->validate([
            'tag_icon' => 'nullable|string|max:255',
            'tag_title' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'pills' => 'nullable|array',
            'pills.*' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $serviceIntro->fill([
            'tag_icon' => $request->tag_icon,
            'tag_title' => $request->tag_title,
            'title' => $request->title,
            'description' => $request->description,
            'pills' => collect($request->pills ?? [])->filter()->values()->toArray(),
            'status' => $request->has('status') ? 1 : 0,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        $serviceIntro->save();

        return redirect()
            ->route('admin.service-intros.index')
            ->with('success', 'Services intro section updated successfully.');
    }
}
