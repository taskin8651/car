<?php

namespace App\Http\Controllers\Admin;

use App\Models\BookingEnquiry;
use App\Models\Car;
use App\Models\CarEnquiry;
use App\Models\ContactEnquiry;
use App\Models\GalleryItem;
use App\Models\ServiceCard;
use App\Models\Testimonial;

class HomeController
{
    public function index()
    {
        $carEnquiries = CarEnquiry::latest()->get();
        $bookingEnquiries = BookingEnquiry::latest()->get();
        $contactEnquiries = ContactEnquiry::latest()->get();

        $recentEnquiries = collect()
            ->merge($carEnquiries->take(6)->map(fn ($item) => [
                'type' => 'Car Enquiry',
                'name' => $item->name,
                'phone' => $item->mobile,
                'event' => $item->event_type,
                'status' => $item->status,
                'created_at' => $item->created_at,
                'url' => route('admin.car-enquiries.show', $item),
            ]))
            ->merge($bookingEnquiries->take(6)->map(fn ($item) => [
                'type' => 'Booking Enquiry',
                'name' => $item->customer_name,
                'phone' => $item->mobile_number,
                'event' => $item->event_type,
                'status' => $item->status,
                'created_at' => $item->created_at,
                'url' => route('admin.booking-enquiries.show', $item),
            ]))
            ->merge($contactEnquiries->take(6)->map(fn ($item) => [
                'type' => 'Contact Enquiry',
                'name' => $item->full_name,
                'phone' => $item->mobile_number,
                'event' => $item->event_type,
                'status' => $item->status,
                'created_at' => $item->created_at,
                'url' => route('admin.contact-enquiries.show', $item),
            ]))
            ->sortByDesc('created_at')
            ->take(10)
            ->values();

        $stats = [
            'carEnquiriesTotal' => $carEnquiries->count(),
            'carEnquiriesNew' => $carEnquiries->where('status', 'new')->count(),
            'bookingEnquiriesTotal' => $bookingEnquiries->count(),
            'bookingEnquiriesNew' => $bookingEnquiries->where('status', 'new')->count(),
            'contactEnquiriesTotal' => $contactEnquiries->count(),
            'contactEnquiriesNew' => $contactEnquiries->where('status', 'new')->count(),
            'carsTotal' => Car::count(),
            'carsActive' => Car::where('is_active', true)->count(),
            'servicesTotal' => ServiceCard::count(),
            'galleryTotal' => GalleryItem::count(),
            'testimonialsTotal' => Testimonial::count(),
        ];

        return view('home', compact('stats', 'recentEnquiries', 'carEnquiries', 'bookingEnquiries', 'contactEnquiries'));
    }
}
