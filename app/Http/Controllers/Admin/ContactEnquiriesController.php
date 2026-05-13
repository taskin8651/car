<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use Illuminate\Http\Request;

class ContactEnquiriesController extends Controller
{
    public function index()
    {
        $contactEnquiries = ContactEnquiry::query()
            ->latest()
            ->get();

        return view('admin.contact-enquiries.index', compact('contactEnquiries'));
    }

    public function show(ContactEnquiry $contactEnquiry)
    {
        if ($contactEnquiry->status === 'new') {
            $contactEnquiry->update(['status' => 'viewed']);
        }

        return view('admin.contact-enquiries.show', compact('contactEnquiry'));
    }

    public function update(Request $request, ContactEnquiry $contactEnquiry)
    {
        $request->validate([
            'status' => 'required|string|in:new,viewed,contacted,closed',
        ]);

        $contactEnquiry->update(['status' => $request->status]);

        return redirect()
            ->route('admin.contact-enquiries.show', $contactEnquiry)
            ->with('success', 'Contact enquiry status updated successfully.');
    }

    public function destroy(ContactEnquiry $contactEnquiry)
    {
        $contactEnquiry->delete();

        return redirect()
            ->route('admin.contact-enquiries.index')
            ->with('success', 'Contact enquiry deleted successfully.');
    }
}
