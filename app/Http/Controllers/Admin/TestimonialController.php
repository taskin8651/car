<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::query()
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        Testimonial::create($data);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', compact('testimonial'));
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $this->validatedData($request);
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        $testimonial->update($data);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'client_name' => 'required|string|max:255',
            'event_type' => 'required|string|max:255',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'avatar_text' => 'nullable|string|max:5',
            'status' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);
    }
}
