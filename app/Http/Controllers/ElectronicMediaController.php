<?php

namespace App\Http\Controllers;

use App\Models\ElectronicMedia;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ElectronicMediaController extends Controller
{
    public function index()
    {
        $electronicMedia = ElectronicMedia::latest()->paginate(10);
        return view('admin.electronic-media.index', compact('electronicMedia'));
    }

    public function create()
    {
        $media = Media::images()->latest()->get();
        return view('admin.electronic-media.create', compact('media'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'short_description_en' => 'nullable|string',
            'short_description_kn' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_kn' => 'nullable|string',
            'youtube_url' => 'required|url',
            'thumbnail_media_id' => 'nullable|exists:media,id',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        ElectronicMedia::create([
            'title_en' => $request->title_en,
            'title_kn' => $request->title_kn,
            'slug' => Str::slug($request->title_en),
            'short_description_en' => $request->short_description_en,
            'short_description_kn' => $request->short_description_kn,
            'description_en' => $request->description_en,
            'description_kn' => $request->description_kn,
            'youtube_url' => $request->youtube_url,
            'thumbnail_media_id' => $request->thumbnail_media_id,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.electronic-media.index')->with('success', 'Electronic Media added successfully!');
    }

    public function edit(ElectronicMedia $electronicMedia)
    {
        $media = Media::images()->latest()->get();
        return view('admin.electronic-media.edit', compact('electronicMedia', 'media'));
    }

    public function update(Request $request, ElectronicMedia $electronicMedia)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'short_description_en' => 'nullable|string',
            'short_description_kn' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_kn' => 'nullable|string',
            'youtube_url' => 'required|url',
            'thumbnail_media_id' => 'nullable|exists:media,id',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $electronicMedia->update([
            'title_en' => $request->title_en,
            'title_kn' => $request->title_kn,
            'short_description_en' => $request->short_description_en,
            'short_description_kn' => $request->short_description_kn,
            'description_en' => $request->description_en,
            'description_kn' => $request->description_kn,
            'youtube_url' => $request->youtube_url,
            'thumbnail_media_id' => $request->thumbnail_media_id,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.electronic-media.index')->with('success', 'Electronic Media updated successfully!');
    }

    public function destroy(ElectronicMedia $electronicMedia)
    {
        $electronicMedia->delete();
        return redirect()->route('admin.electronic-media.index')->with('success', 'Electronic Media deleted successfully!');
    }

    // Public method
    public function publicIndex()
    {
        $electronicMedia = ElectronicMedia::active()->ordered()->paginate(12);
        return view('pages.electronic-media', compact('electronicMedia'));
    }
}
