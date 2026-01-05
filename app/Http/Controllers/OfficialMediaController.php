<?php

namespace App\Http\Controllers;

use App\Models\OfficialMedia;
use App\Models\Media;
use Illuminate\Http\Request;

class OfficialMediaController extends Controller
{
    public function index()
    {
        $officialMedia = OfficialMedia::with('media')->latest()->paginate(10);
        return view('admin.official-media.index', compact('officialMedia'));
    }

    public function create()
    {
        $media = Media::latest()->get();
        return view('admin.official-media.create', compact('media'));
    }

    public function store(Request $request)
    {
        $rules = [
            'title_en' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'description_kn' => 'nullable|string',
            'media_type' => 'required|in:image,video,youtube,instagram,facebook,twitter',
            'published_date' => 'nullable|date',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ];

        if (in_array($request->media_type, ['image', 'video'])) {
            $rules['media_id'] = 'required|exists:media,id';
        } else {
            $rules['social_link'] = 'required|url';
        }

        $request->validate($rules);

        OfficialMedia::create([
            'title_en' => $request->title_en,
            'title_kn' => $request->title_kn,
            'description_en' => $request->description_en,
            'description_kn' => $request->description_kn,
            'media_type' => $request->media_type,
            'social_link' => $request->social_link,
            'media_id' => $request->media_id,
            'published_date' => $request->published_date,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.official-media.index')->with('success', 'Official Media added successfully!');
    }

    public function edit(OfficialMedia $officialMedia)
    {
        $media = Media::latest()->get();
        return view('admin.official-media.edit', compact('officialMedia', 'media'));
    }

    public function update(Request $request, OfficialMedia $officialMedia)
    {
        $rules = [
            'title_en' => 'required|string|max:255',
            'title_kn' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'description_kn' => 'nullable|string',
            'media_type' => 'required|in:image,video,youtube,instagram,facebook,twitter',
            'published_date' => 'nullable|date',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ];

        if (in_array($request->media_type, ['image', 'video'])) {
            $rules['media_id'] = 'required|exists:media,id';
        } else {
            $rules['social_link'] = 'required|url';
        }

        $request->validate($rules);

        $officialMedia->update([
            'title_en' => $request->title_en,
            'title_kn' => $request->title_kn,
            'description_en' => $request->description_en,
            'description_kn' => $request->description_kn,
            'media_type' => $request->media_type,
            'social_link' => $request->social_link,
            'media_id' => $request->media_id,
            'published_date' => $request->published_date,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.official-media.index')->with('success', 'Official Media updated successfully!');
    }

    public function destroy(OfficialMedia $officialMedia)
    {
        $officialMedia->delete();
        return redirect()->route('admin.official-media.index')->with('success', 'Official Media deleted successfully!');
    }

    public function publicIndex()
    {
        $officialMedia = OfficialMedia::active()->ordered()->with('media')->paginate(24);
        return view('pages.official-media', compact('officialMedia'));
    }
}
