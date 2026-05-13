<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutMission;
use Illuminate\Http\Request;

class AboutMissionController extends Controller
{
    public function index()
    {
        $aboutMission = AboutMission::query()->first();

        if (!$aboutMission) {
            $aboutMission = AboutMission::create([
                'tag_icon' => 'bi bi-bullseye',
                'tag_title' => 'Business Mission',
                'title' => 'To Make Every Wedding Entry Premium, Smooth & Royal',
                'description' => 'Our mission is to provide reliable luxury car rental services that help customers create grand entries and beautiful event memories without stress.',
                'status' => 1,
                'sort_order' => 0,
            ]);
        }

        return view('admin.about-missions.index', compact('aboutMission'));
    }

    public function update(Request $request)
    {
        $aboutMission = AboutMission::query()->first();

        if (!$aboutMission) {
            $aboutMission = new AboutMission();
        }

        $request->validate([
            'tag_icon' => 'nullable|string|max:255',
            'tag_title' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $aboutMission->fill([
            'tag_icon' => $request->tag_icon,
            'tag_title' => $request->tag_title,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->has('status') ? 1 : 0,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        $aboutMission->save();

        return redirect()
            ->route('admin.about-missions.index')
            ->with('success', 'Business mission section updated successfully.');
    }
}