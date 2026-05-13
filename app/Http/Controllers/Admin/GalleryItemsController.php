<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;

class GalleryItemsController extends Controller
{
    public function index()
    {
        $galleryItems = GalleryItem::query()
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.gallery-items.index', compact('galleryItems'));
    }

    public function create()
    {
        return view('admin.gallery-items.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        $galleryItem = GalleryItem::create($data);
        $this->storeImage($request, $galleryItem);

        return redirect()
            ->route('admin.gallery-items.index')
            ->with('success', 'Gallery item created successfully.');
    }

    public function show(GalleryItem $galleryItem)
    {
        return view('admin.gallery-items.show', compact('galleryItem'));
    }

    public function edit(GalleryItem $galleryItem)
    {
        return view('admin.gallery-items.edit', compact('galleryItem'));
    }

    public function update(Request $request, GalleryItem $galleryItem)
    {
        $data = $this->validatedData($request);
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        $galleryItem->update($data);
        $this->storeImage($request, $galleryItem);

        return redirect()
            ->route('admin.gallery-items.index')
            ->with('success', 'Gallery item updated successfully.');
    }

    public function destroy(GalleryItem $galleryItem)
    {
        $galleryItem->clearMediaCollection('gallery_image');
        $galleryItem->delete();

        return redirect()
            ->route('admin.gallery-items.index')
            ->with('success', 'Gallery item deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image_url' => 'nullable|string',
            'image_alt' => 'nullable|string|max:255',
            'card_size' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);
    }

    private function storeImage(Request $request, GalleryItem $galleryItem): void
    {
        if ($request->hasFile('image')) {
            $galleryItem
                ->addMediaFromRequest('image')
                ->toMediaCollection('gallery_image');
        }
    }
}
