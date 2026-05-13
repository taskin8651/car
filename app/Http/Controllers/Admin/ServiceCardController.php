<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCard;
use Illuminate\Http\Request;

class ServiceCardController extends Controller
{
    public function index()
    {
        if (!ServiceCard::query()->exists()) {
            ServiceCard::insert($this->defaultCards());
        }

        $serviceCards = ServiceCard::query()
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.service-cards.index', compact('serviceCards'));
    }

    public function create()
    {
        return view('admin.service-cards.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;
        $data['button_text'] = $request->button_text ?: 'Enquire Now';
        $data['button_url'] = $request->button_url ?: 'booking-enquiry.html';

        ServiceCard::create($data);

        return redirect()
            ->route('admin.service-cards.index')
            ->with('success', 'Service card created successfully.');
    }

    public function show(ServiceCard $serviceCard)
    {
        return view('admin.service-cards.show', compact('serviceCard'));
    }

    public function edit(ServiceCard $serviceCard)
    {
        return view('admin.service-cards.edit', compact('serviceCard'));
    }

    public function update(Request $request, ServiceCard $serviceCard)
    {
        $data = $this->validatedData($request);
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;
        $data['button_text'] = $request->button_text ?: 'Enquire Now';
        $data['button_url'] = $request->button_url ?: 'booking-enquiry.html';

        $serviceCard->update($data);

        return redirect()
            ->route('admin.service-cards.index')
            ->with('success', 'Service card updated successfully.');
    }

    public function destroy(ServiceCard $serviceCard)
    {
        $serviceCard->delete();

        return redirect()
            ->route('admin.service-cards.index')
            ->with('success', 'Service card deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);
    }

    private function defaultCards(): array
    {
        $now = now();

        return [
            [
                'icon' => 'bi bi-stars',
                'title' => 'Luxury Car For Groom Entry',
                'description' => 'Royal luxury car service for groom entry and grand wedding arrival.',
                'button_text' => 'Enquire Now',
                'button_url' => 'booking-enquiry.html',
                'status' => 1,
                'sort_order' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'icon' => 'bi bi-car-front-fill',
                'title' => 'Wedding Car Rental',
                'description' => 'Premium cars for marriage functions, wedding venues and celebrations.',
                'button_text' => 'Enquire Now',
                'button_url' => 'booking-enquiry.html',
                'status' => 1,
                'sort_order' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'icon' => 'bi bi-heart',
                'title' => 'Bridal Entry Car',
                'description' => 'Elegant decorated car service for bridal entry and premium moments.',
                'button_text' => 'Enquire Now',
                'button_url' => 'booking-enquiry.html',
                'status' => 1,
                'sort_order' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'icon' => 'bi bi-flower1',
                'title' => 'Reception Car Rental',
                'description' => 'Stylish luxury cars for reception arrival and guest impressions.',
                'button_text' => 'Enquire Now',
                'button_url' => 'booking-enquiry.html',
                'status' => 1,
                'sort_order' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'icon' => 'bi bi-calendar-heart',
                'title' => 'Engagement Car Rental',
                'description' => 'Luxury cars for engagement ceremonies, ring events and family functions.',
                'button_text' => 'Enquire Now',
                'button_url' => 'booking-enquiry.html',
                'status' => 1,
                'sort_order' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'icon' => 'bi bi-camera',
                'title' => 'Pre-Wedding Shoot Car',
                'description' => 'Premium cars for cinematic couple shoots and luxury photoshoot concepts.',
                'button_text' => 'Enquire Now',
                'button_url' => 'booking-enquiry.html',
                'status' => 1,
                'sort_order' => 6,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'icon' => 'bi bi-person-check',
                'title' => 'VIP Guest Pickup & Drop',
                'description' => 'Comfortable luxury transport for important guests, family and VIP movement.',
                'button_text' => 'Enquire Now',
                'button_url' => 'booking-enquiry.html',
                'status' => 1,
                'sort_order' => 7,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'icon' => 'bi bi-briefcase',
                'title' => 'Corporate & Event Luxury Car',
                'description' => 'Premium cars for corporate events, launches, meetings and private occasions.',
                'button_text' => 'Enquire Now',
                'button_url' => 'booking-enquiry.html',
                'status' => 1,
                'sort_order' => 8,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
    }
}
