<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('featuredMedia')->latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        $media = Media::images()->latest()->get();
        return view('admin.events.create', compact('media'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'short_description_en' => 'required|string',
            'short_description_kn' => 'nullable|string',
            'description_en' => 'required|string',
            'description_kn' => 'nullable|string',
            'featured_media_id' => 'nullable|exists:media,id',
            'event_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
            'gallery_media' => 'nullable|array',
        ]);

        $event = Event::create([
            'title_en' => $request->title_en,
            'title_kn' => $request->title_kn,
            'slug' => Str::slug($request->title_en),
            'short_description_en' => $request->short_description_en,
            'short_description_kn' => $request->short_description_kn,
            'description_en' => $request->description_en,
            'description_kn' => $request->description_kn,
            'featured_media_id' => $request->featured_media_id,
            'event_date' => $request->event_date,
            'location' => $request->location,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ]);

        if ($request->gallery_media) {
            foreach ($request->gallery_media as $index => $mediaId) {
                $event->media()->attach($mediaId, ['sort_order' => $index]);
            }
        }

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
    }

    public function edit(Event $event)
    {
        $media = Media::images()->latest()->get();
        $event->load('media');
        return view('admin.events.edit', compact('event', 'media'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'short_description_en' => 'required|string',
            'short_description_kn' => 'nullable|string',
            'description_en' => 'required|string',
            'description_kn' => 'nullable|string',
            'featured_media_id' => 'nullable|exists:media,id',
            'event_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
            'gallery_media' => 'nullable|array',
        ]);

        $event->update([
            'title_en' => $request->title_en,
            'title_kn' => $request->title_kn,
            'short_description_en' => $request->short_description_en,
            'short_description_kn' => $request->short_description_kn,
            'description_en' => $request->description_en,
            'description_kn' => $request->description_kn,
            'featured_media_id' => $request->featured_media_id,
            'event_date' => $request->event_date,
            'location' => $request->location,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ]);

        $event->media()->detach();
        if ($request->gallery_media) {
            foreach ($request->gallery_media as $index => $mediaId) {
                $event->media()->attach($mediaId, ['sort_order' => $index]);
            }
        }

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        $event->media()->detach();
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
    }

    // Public methods
    public function publicIndex()
    {
        $events = Event::latest()->with('featuredMedia')->paginate(12);
        return view('pages.events.index', compact('events'));
    }

    public function show($slug)
    {
        $event = Event::where('slug', $slug)->active()->with(['featuredMedia', 'media'])->firstOrFail();
        return view('pages.events.show', compact('event'));
    }
}
