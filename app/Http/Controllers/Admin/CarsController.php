<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarsController extends Controller
{
    public function index()
    {
        $cars = Car::query()
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data = $this->normalizeData($request, $data);

        $car = Car::create($data);
        $this->storeMedia($request, $car);

        return redirect()
            ->route('admin.cars.index')
            ->with('success', 'Car created successfully.');
    }

    public function show(Car $car)
    {
        return view('admin.cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $data = $this->validatedData($request, $car);
        $data = $this->normalizeData($request, $data);

        $car->update($data);
        $this->storeMedia($request, $car);

        return redirect()
            ->route('admin.cars.index')
            ->with('success', 'Car updated successfully.');
    }

    public function destroy(Car $car)
    {
        $car->clearMediaCollection('car_main_image');
        $car->clearMediaCollection('car_gallery');
        $car->delete();

        return redirect()
            ->route('admin.cars.index')
            ->with('success', 'Car deleted successfully.');
    }

    private function validatedData(Request $request, ?Car $car = null): array
    {
        $carId = $car?->id ?: 'NULL';

        return $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:cars,slug,' . $carId,
            'brand' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'seating' => 'nullable|string|max:255',
            'decoration' => 'nullable|string|max:255',
            'driver' => 'nullable|string|max:255',
            'price_text' => 'nullable|string|max:255',
            'price_note' => 'nullable|string',
            'status_label' => 'nullable|string|max:255',
            'status_class' => 'nullable|string|max:255',
            'tag_icon' => 'nullable|string|max:255',
            'tag_title' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'description_title' => 'nullable|string|max:255',
            'description_one' => 'nullable|string',
            'description_two' => 'nullable|string',
            'image_url' => 'nullable|string',
            'image_alt' => 'nullable|string|max:255',
            'gallery_urls' => 'nullable|array',
            'gallery_urls.*' => 'nullable|string',
            'specs' => 'nullable|array',
            'quick_points' => 'nullable|array',
            'features' => 'nullable|array',
            'locations' => 'nullable|array',
            'terms' => 'nullable|array',
            'enquiry_url' => 'nullable|string|max:255',
            'whatsapp_url' => 'nullable|string|max:255',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:4096',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);
    }

    private function normalizeData(Request $request, array $data): array
    {
        $data['slug'] = $request->slug ?: Str::slug($request->name);
        $data['status_label'] = $request->status_label ?: 'Available';
        $data['status_class'] = $request->status_class ?: 'available';
        $data['tag_icon'] = $request->tag_icon ?: 'bi bi-gem';
        $data['tag_title'] = $request->tag_title ?: 'Wedding Ready Luxury Car';
        $data['enquiry_url'] = $request->enquiry_url ?: 'booking-enquiry.html';
        $data['whatsapp_url'] = $request->whatsapp_url ?: 'https://wa.me/919999999999';
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        foreach (['gallery_urls', 'specs', 'quick_points', 'features', 'locations', 'terms'] as $field) {
            $data[$field] = collect($request->{$field} ?? [])->filter()->values()->toArray();
        }

        return $data;
    }

    private function storeMedia(Request $request, Car $car): void
    {
        if ($request->hasFile('main_image')) {
            $car
                ->addMediaFromRequest('main_image')
                ->toMediaCollection('car_main_image');
        }

        foreach ($request->file('gallery_images', []) as $image) {
            $car
                ->addMedia($image)
                ->toMediaCollection('car_gallery');
        }
    }
}
