<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\ContactEnquiry;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        $cars = Car::query()
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        return view('frontend.contact', compact('cars'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:30',
            'email' => 'nullable|email|max:255',
            'event_type' => 'required|string|max:255',
            'event_date' => 'nullable|date',
            'preferred_car' => 'nullable|string|max:255',
            'pickup_location' => 'nullable|string|max:255',
            'decoration_required' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        $data['status'] = 'new';

        ContactEnquiry::create($data);

        return redirect()
            ->route('frontend.contact')
            ->with('contact_enquiry_success', 'Your enquiry has been submitted successfully. Our team will contact you soon.');
    }
}
