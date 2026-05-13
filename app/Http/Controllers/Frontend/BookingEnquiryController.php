<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BookingEnquiry;
use App\Models\Car;
use Illuminate\Http\Request;

class BookingEnquiryController extends Controller
{
    public function create()
    {
        $cars = Car::query()
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        return view('frontend.booking-enquiry', compact('cars'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:30',
            'email' => 'nullable|email|max:255',
            'event_type' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'pickup_location' => 'required|string|max:255',
            'drop_location' => 'nullable|string|max:255',
            'preferred_car' => 'required|string|max:255',
            'decoration_required' => 'required|string|max:255',
            'message' => 'nullable|string',
        ]);

        $data['status'] = 'new';

        BookingEnquiry::create($data);

        return redirect()
            ->route('frontend.booking-enquiry')
            ->with('booking_enquiry_success', 'Your booking enquiry has been submitted successfully. Our team will contact you soon.');
    }
}
