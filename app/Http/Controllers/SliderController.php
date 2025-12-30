<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Media;
use App\Models\MajorDevelopment;
use App\Models\ScamExposed;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::ordered()->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        $media = Media::images()->latest()->get();
        $majorDevelopments = MajorDevelopment::active()->ordered()->get();
        $scamsExposed = ScamExposed::active()->ordered()->get();
        $events = Event::where('status', 'active')->latest()->get();
        
        return view('admin.sliders.create', compact('media', 'majorDevelopments', 'scamsExposed', 'events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'paragraph_en' => 'required|string',
            'paragraph_kn' => 'nullable|string',
            'button_text_en' => 'nullable|string|max:255',
            'button_text_kn' => 'nullable|string|max:255',
            'button_link_type' => 'nullable|string|in:major_development,scam_exposed,event,custom',
            'button_link_id' => 'nullable|integer',
            'button_link_url' => 'nullable|string|max:255',
            'media_id' => 'required|exists:media,id',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $media = Media::findOrFail($request->media_id);

        Slider::create([
            'title_en' => $request->title_en,
            'title_kn' => $request->title_kn,
            'paragraph_en' => $request->paragraph_en,
            'paragraph_kn' => $request->paragraph_kn,
            'button_text_en' => $request->button_text_en,
            'button_text_kn' => $request->button_text_kn,
            'button_link_type' => $request->button_link_type,
            'button_link_id' => $request->button_link_type !== 'custom' ? $request->button_link_id : null,
            'button_link_url' => $request->button_link_type === 'custom' ? $request->button_link_url : null,
            'image' => $media->file_name,
            'media_id' => $request->media_id,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully!');
    }

    public function edit(Slider $slider)
    {
        $media = Media::images()->latest()->get();
        $majorDevelopments = MajorDevelopment::active()->ordered()->get();
        $scamsExposed = ScamExposed::active()->ordered()->get();
        $events = Event::where('status', 'active')->latest()->get();
        
        return view('admin.sliders.edit', compact('slider', 'media', 'majorDevelopments', 'scamsExposed', 'events'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'paragraph_en' => 'required|string',
            'paragraph_kn' => 'nullable|string',
            'button_text_en' => 'nullable|string|max:255',
            'button_text_kn' => 'nullable|string|max:255',
            'button_link_type' => 'nullable|string|in:major_development,scam_exposed,event,custom',
            'button_link_id' => 'nullable|integer',
            'button_link_url' => 'nullable|string|max:255',
            'media_id' => 'required|exists:media,id',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $media = Media::findOrFail($request->media_id);

        $slider->update([
            'title_en' => $request->title_en,
            'title_kn' => $request->title_kn,
            'paragraph_en' => $request->paragraph_en,
            'paragraph_kn' => $request->paragraph_kn,
            'button_text_en' => $request->button_text_en,
            'button_text_kn' => $request->button_text_kn,
            'button_link_type' => $request->button_link_type,
            'button_link_id' => $request->button_link_type !== 'custom' ? $request->button_link_id : null,
            'button_link_url' => $request->button_link_type === 'custom' ? $request->button_link_url : null,
            'image' => $media->file_name,
            'media_id' => $request->media_id,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully!');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully!');
    }
}
