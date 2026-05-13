<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class WebsiteSettingsController extends Controller
{
    public function index()
    {
        $websiteSetting = WebsiteSetting::current();

        return view('admin.website-settings.index', compact('websiteSetting'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'site_name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'phone' => 'nullable|string|max:255',
            'alternate_phone' => 'nullable|string|max:255',
            'whatsapp_number' => 'nullable|string|max:255',
            'whatsapp_url' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'business_address' => 'nullable|string',
            'google_map_embed_url' => 'nullable|string',
            'opening_hours' => 'nullable|string|max:255',
            'facebook_url' => 'nullable|string|max:255',
            'instagram_url' => 'nullable|string|max:255',
            'youtube_url' => 'nullable|string|max:255',
            'privacy_policy_url' => 'nullable|string|max:255',
            'terms_url' => 'nullable|string|max:255',
            'logo_url' => 'nullable|string',
            'favicon_url' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg,ico|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg,ico|max:1024',
        ]);

        $websiteSetting = WebsiteSetting::current();
        $websiteSetting->update($data);

        if ($request->hasFile('logo')) {
            $websiteSetting->addMediaFromRequest('logo')->toMediaCollection('site_logo');
        }

        if ($request->hasFile('favicon')) {
            $websiteSetting->addMediaFromRequest('favicon')->toMediaCollection('site_favicon');
        }

        return redirect()
            ->back()
            ->with('success', 'Website settings updated successfully.');
    }
}
