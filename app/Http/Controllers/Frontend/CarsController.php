<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarEnquiry;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index()
    {
        $cars = Car::query()
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        return view('frontend.cars', compact('cars'));
    }

    public function show(Car $car)
    {
        abort_unless($car->is_active, 404);

        $relatedCars = Car::query()
            ->where('is_active', 1)
            ->where('id', '!=', $car->id)
            ->orderBy('sort_order')
            ->limit(3)
            ->get();

        return view('frontend.car-details', compact('car', 'relatedCars'));
    }

    public function storeEnquiry(Request $request, Car $car)
    {
        abort_unless($car->is_active, 404);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:30',
            'event_type' => 'required|string|max:255',
            'event_date' => 'required|date',
            'pickup_location' => 'required|string|max:255',
            'decoration_required' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        $data['car_id'] = $car->id;
        $data['status'] = 'new';

        CarEnquiry::create($data);

        return redirect()
            ->route('frontend.cars.show', $car)
            ->with('car_enquiry_success', 'Your enquiry has been submitted successfully. Our team will contact you soon.');
    }
}
