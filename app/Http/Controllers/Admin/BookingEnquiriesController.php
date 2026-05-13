<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookingEnquiry;
use Illuminate\Http\Request;

class BookingEnquiriesController extends Controller
{
    public function index()
    {
        $bookingEnquiries = BookingEnquiry::query()
            ->latest()
            ->get();

        return view('admin.booking-enquiries.index', compact('bookingEnquiries'));
    }

    public function show(BookingEnquiry $bookingEnquiry)
    {
        if ($bookingEnquiry->status === 'new') {
            $bookingEnquiry->update(['status' => 'viewed']);
        }

        return view('admin.booking-enquiries.show', compact('bookingEnquiry'));
    }

    public function update(Request $request, BookingEnquiry $bookingEnquiry)
    {
        $request->validate([
            'status' => 'required|string|in:new,viewed,contacted,closed',
        ]);

        $bookingEnquiry->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.booking-enquiries.show', $bookingEnquiry)
            ->with('success', 'Booking enquiry status updated successfully.');
    }

    public function destroy(BookingEnquiry $bookingEnquiry)
    {
        $bookingEnquiry->delete();

        return redirect()
            ->route('admin.booking-enquiries.index')
            ->with('success', 'Booking enquiry deleted successfully.');
    }
}
