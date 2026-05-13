<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarEnquiry;
use Illuminate\Http\Request;

class CarEnquiriesController extends Controller
{
    public function index()
    {
        $carEnquiries = CarEnquiry::with('car')
            ->latest()
            ->get();

        return view('admin.car-enquiries.index', compact('carEnquiries'));
    }

    public function show(CarEnquiry $carEnquiry)
    {
        $carEnquiry->load('car');

        if ($carEnquiry->status === 'new') {
            $carEnquiry->update(['status' => 'viewed']);
        }

        return view('admin.car-enquiries.show', compact('carEnquiry'));
    }

    public function update(Request $request, CarEnquiry $carEnquiry)
    {
        $request->validate([
            'status' => 'required|string|in:new,viewed,contacted,closed',
        ]);

        $carEnquiry->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.car-enquiries.show', $carEnquiry)
            ->with('success', 'Car enquiry status updated successfully.');
    }

    public function destroy(CarEnquiry $carEnquiry)
    {
        $carEnquiry->delete();

        return redirect()
            ->route('admin.car-enquiries.index')
            ->with('success', 'Car enquiry deleted successfully.');
    }
}
